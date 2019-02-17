<?php

namespace Maropost\Api;

use Maropost\Api\ResultTypes\GetResult;
use Maropost\Api\Abstractions\Api;
use Httpful\Request;

/**
 * Class Campaigns
 * @package Maropost\Api
 */
class Campaigns
{
    use Api;

    /**
     * Campaigns constructor.
     * @param $accountId
     * @param $authToken
     */
    public function __construct($accountId, $authToken)
    {
        $this->auth_token = $authToken;
        $this->accountId = $accountId;
        $this->resource = 'campaigns';
    }

    /**
     * Gets the list of campaigns
     * @return GetResult
     */
    public function get(): GetResult
    {
        return $this->_get();
    }

    /**
     * Gets the list of delivered report for the specified campaign
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getDeliveredReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('delivered_report');
    }

    /**
     * Gets a list of Open Reports for the sepcified Campaign
     *
     * @param int $id The campaign ID
     * @param bool|null $unique Gets for unique contacts
     * @return GetResult
     */
    public function getOpenReports(int $id, bool $unique = null): GetResult
    {
        $this->resource .= "/{$id}";

        $params = [];
        if (!empty($unique)) {
            $params['unique'] = $unique === true ? 'true' : 'false';
        }

        return $this->_get('open_report', $params);
    }

    /**
     * Gets a list of Click Reports for the sepcified Campaign
     *
     * @param int $id The campaign ID
     * @param bool|null $unique Gets for unique contacts
     * @return GetResult
     */
    public function getClickReports(int $id, bool $unique = null): GetResult
    {
        $this->resource .= "/{$id}";

        $params = [];
        if (!empty($unique)) {
            $params['unique'] = $unique === true ? 'true' : 'false';
        }

        return $this->_get('click_report', $params);
    }

    /**
     * Gets a list of Link Reports for the specified Campaign
     *
     * @param int $id The campaign ID
     * @param bool|null $unique Gets for unique contacts
     * @return GetResult
     */
    public function getLinkReports(int $id, bool $unique = null): GetResult
    {
        $this->resource .= "/{$id}";

        $params = [];
        if (!empty($unique)) {
            $params['unique'] = $unique === true ? 'true' : 'false';
        }

        return $this->_get('link_report', $params);

    }

    /**
     * Gets a list of Bounce Reports for the specified Campaign
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getBounceReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('bounce_report');
    }

    /**
     * Gets a list of soft bounce reports for the specified Campaign
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getSoftBounceReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('soft_bounce_report');
    }

    /**
     * Gets a list of hard bounces for the specified campaigns
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getHardBounceReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('hard_bounce_report');
    }

    /**
     * Gets a list of unsubsrcibe reports for the specified campaign
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getUnsubscribeReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('unsubscribe_report');
    }

    /**
     * Gets a list of complain reports for the specified campaign
     *
     * @param int $id The campaign ID
     * @return GetResult
     */
    public function getComplaintReports(int $id): GetResult
    {
        $this->resource .= "/{$id}";

        return $this->_get('complaint_report');
    }


}