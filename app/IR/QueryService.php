<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:38 PM
 */

namespace BlazeCMS\IR;


use BlazeCMS\IR\Models\DailyHistoricalPrice;
use BlazeCMS\IR\Models\Download;
use BlazeCMS\IR\Models\News;
use BlazeCMS\IR\Models\StockFundamental;
use BlazeCMS\IR\Models\StockPrice;
use BlazeCMS\IR\Models\SummaryHistoricalPrice;
use BlazeCMS\IR\Query\AnalysisQuery;
use BlazeCMS\IR\Query\AnnualReportQuery;
use BlazeCMS\IR\Query\CreditRatingQuery;
use BlazeCMS\IR\Query\CompanySnapshotQuery;
use BlazeCMS\IR\Query\DailyHistoricalPriceQuery;
use BlazeCMS\IR\Query\FactsheetQuery;
use BlazeCMS\IR\Query\FinancialStatementQuery;
use BlazeCMS\IR\Query\Form561Query;
use BlazeCMS\IR\Query\OneReportQuery;
use BlazeCMS\IR\Query\HighlightDownloadQuery;
use BlazeCMS\IR\Query\HighlightNewsQuery;
use BlazeCMS\IR\Query\MdnaQuery;
use BlazeCMS\IR\Query\NewsClippingQuery;
use BlazeCMS\IR\Query\NewsDetailQuery;
use BlazeCMS\IR\Query\NewsletterQuery;
use BlazeCMS\IR\Query\NewsQuery;
use BlazeCMS\IR\Query\NewsSearchQuery;
use BlazeCMS\IR\Query\PresentationQuery;
use BlazeCMS\IR\Query\PressReleaseQuery;
use BlazeCMS\IR\Query\ProspectusQuery;
use BlazeCMS\IR\Query\SetAnnouncementQuery;
use BlazeCMS\IR\Query\StockFundamentalQuery;
use BlazeCMS\IR\Query\StockPriceQuery;
use BlazeCMS\IR\Query\SummaryHistoricalPriceQuery;
use BlazeCMS\IR\Query\WebcastQuery;

class QueryService
{
    private $client;


    public function __construct(StockClient $client)
    {
        $this->client = $client;
    }


    //stock
    public function getStockPrice()
    {
        $response = $this->client->query(new StockPriceQuery());

        return isset($response) ? new StockPrice($response) : null;
    }

    public function getStockFundamental()
    {
        $response = $this->client->query(new StockFundamentalQuery());

        return isset($response) ? new StockFundamental($response) : null;
    }


    public function getSummaryHistoricalPrices()
    {
        $response = $this->client->query(new SummaryHistoricalPriceQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new SummaryHistoricalPrice($item);
            });
        }

        return collect();
    }

    //date format => yyyyMMdd
    public function getDailyHistoricalPrices($date_start = null, $date_end = null)
    {

        $response = $this->client->query(new DailyHistoricalPriceQuery($date_start , $date_end));

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new DailyHistoricalPrice($item);
            });
        }

        return collect();
    }


    // news

    public function searchNews($keyword = null)
    {

        $response = $this->client->query(new NewsSearchQuery($keyword));


        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }


    public function getNews()
    {

        $response = $this->client->query(new NewsQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }

    public function getSetAnnouncements()
    {

        $response = $this->client->query(new SetAnnouncementQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }

    public function getNewsClippings()
    {

        $response = $this->client->query(new NewsClippingQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }

    public function getPressReleases()
    {

        $response = $this->client->query(new PressReleaseQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }

    public function getHighlightNews()
    {

        $response = $this->client->query(new HighlightNewsQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new News($item);
            });
        }

        return collect();
    }

    public function getNewsDetail($id)
    {

        $response = $this->client->query(new NewsDetailQuery($id));

        if (isset($response)) {

            return new News($response);
        }

        return collect();
    }

    //downloads

    public function getPresentations()
    {

        $response = $this->client->query(new PresentationQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }


    public function getProspectuses()
    {

        $response = $this->client->query(new ProspectusQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }


    public function getHighlightDownloads()
    {

        $response = $this->client->query(new HighlightDownloadQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getFactsheets()
    {

        $response = $this->client->query(new FactsheetQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getAnnualReports()
    {

        $response = $this->client->query(new AnnualReportQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getNewsletters()
    {

        $response = $this->client->query(new NewsletterQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getFinancialStatements()
    {

        $response = $this->client->query(new FinancialStatementQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getAnalyses()
    {

        $response = $this->client->query(new AnalysisQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getForm561()
    {

        $response = $this->client->query(new Form561Query());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getOneReports()
    {

        $response = $this->client->query(new OneReportQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getMdna()
    {

        $response = $this->client->query(new MdnaQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getCreditRating()
    {

        $response = $this->client->query(new CreditRatingQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getCompanySnapshots()
    {

        $response = $this->client->query(new CompanySnapshotQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

    public function getWebcasts()
    {

        $response = $this->client->query(new WebcastQuery());

        if (isset($response)) {

            return collect($response)->map(function ($item) {
                return new Download($item);
            });
        }

        return collect();
    }

}

