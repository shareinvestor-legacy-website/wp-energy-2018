<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/24/2016
 * Time: 9:36 PM
 */

namespace BlazeCMS\Supports\Model;


trait Nestedable
{
    /**
     * Retrieve all nested children except self.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function allExceptDescendantsAndSelf()
    {
        $descendantsAndSelf = $this->getDescendantsAndSelf();

        return $this->all()->diff($descendantsAndSelf);
    }


    /**
     * @param string $field
     * @param string $delimiter
     * @return string
     */
    public function path($field, $delimiter = '/')
    {

        $ancestorsAndSelf = $this->getAncestorsAndSelf();

        return $ancestorsAndSelf->implode($field, $delimiter);

    }

    /**
     * @param string $field
     * @param string $delimiter
     * @return string
     */
    public function basePath($field, $delimiter = '/')
    {

        try {
            $ancestors = $this->getAncestors();

            return $ancestors->implode($field, $delimiter);
        } catch (\Exception $e) {
            return '';
        }
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {

        return !$this->isLeaf();

    }





    //level -> 0, 1, 2, 3
    public function getNodeAt($level)
    {
        try {
            return $this->getAncestorsAndSelf()->toArray()[$level];

        } catch (\Exception $e) {
            return null;
        }

    }


    /**
     * @param json $nestable
     * @param int $parent_id
     */
    public static function ordering($nestable, $parent_id = null)
    {
        $parent = $parent_id === null ? null : static::find($parent_id);

        foreach ($nestable as $node) {
            if ($parent_id === null) {
                $model = static::find($node->id);

                //trick to notify sluggable to reslugify
                $model->parent_id = null;
                $model->save();
                //must call to have this node lay in correct order
                $model->makeRoot();

            } else {
                $child = static::find($node->id);
                //trick to notify sluggable to reslugify
                $child->parent_id = $parent_id;
                $child->save();
                //must call to have this node lay in correct order
                $child->makeChildOf($parent);
            }
            if (isset($node->children)) {
                static::ordering($node->children, $node->id);
            }

        }

        static::rebuild(true);
    }
}
