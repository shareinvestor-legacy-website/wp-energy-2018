<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/21/2016
 * Time: 2:13 PM
 */

namespace BlazeCMS\Supports\Model;


use Illuminate\Database\Eloquent\Builder;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait Translatable
{

    use \Dimsav\Translatable\Translatable;


    /**
     * @return bool
     */
    public function hasUntranslatedLocale()
    {

        return $this->translations()->get()->count() < count(LaravelLocalization::getSupportedLocales());
    }


    /**
     * @return array
     */
    public function untranslatedLocales()
    {

        $translatedLocales = $this->translations()
            ->where('locale', '<>', Lang::getFallback())
            ->get()->pluck('locale')->toArray();


        array_push($translatedLocales, Lang::getFallback());

        return array_except(LaravelLocalization::getSupportedLocales(), $translatedLocales);
    }


    //workaround  - to get baum & translatable worked together
    public function save(array $options = array())
    {
        $tempTranslations = $this->translations;
        if ($this->exists) {
            if (count($this->getDirty()) > 0) {
                // If $this->exists and dirty, parent::save() has to return true. If not,
                // an error has occurred. Therefore we shouldn't save the translations.
                if (parent::save($options)) {
                    $this->setRelation('translations', $tempTranslations);
                    return $this->saveTranslations();
                }
                return false;
            } else {
                // If $this->exists and not dirty, parent::save() skips saving and returns
                // false. So we have to save the translations
                $this->setRelation('translations', $tempTranslations);
                return $this->saveTranslations();
            }
        } elseif (parent::save($options)) {
            // We save the translations only if the instance is saved in the database.
            $this->setRelation('translations', $tempTranslations);
            return $this->saveTranslations();
        }
        return false;
    }


    /**
     *
     * Join query with translation table,, return only parent table columns
     *
     * @param Builder $query
     * @param string $locale
     * @return Builder $query
     */
    public function scopeWithTranslation(Builder $query, $locale = null)
    {
        $locale = isset($locale) ? $locale : fallback_locale();
        $translationTable = $this->getTranslationsTable();
        $localeKey = $this->getLocaleKey();

        return
            $query
                ->leftJoin($translationTable, $translationTable . '.' . $this->getRelationKey(), '=', $this->getTable() . '.' . $this->getKeyName())
                ->where($translationTable . '.' . $localeKey, $locale)
                ->select($this->getTable().'.*');
    }

}