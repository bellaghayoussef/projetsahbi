<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Bulkexports
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Bulkexports\V1\Export;

use Twilio\Exceptions\TwilioException;
use Twilio\Version;
use Twilio\InstanceContext;


class DayContext extends InstanceContext
    {
    /**
     * Initialize the DayContext
     *
     * @param Version $version Version that contains the resource
     * @param string $resourceType The type of communication – Messages, Calls, Conferences, and Participants
     * @param string $day The ISO 8601 format date of the resources in the file, for a UTC day
     */
    public function __construct(
        Version $version,
        $resourceType,
        $day
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'resourceType' =>
            $resourceType,
        'day' =>
            $day,
        ];

        $this->uri = '/Exports/' . \rawurlencode($resourceType)
        .'/Days/' . \rawurlencode($day)
        .'';
    }

    /**
     * Fetch the DayInstance
     *
     * @return DayInstance Fetched DayInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): DayInstance
    {

        $payload = $this->version->fetch('GET', $this->uri);

        return new DayInstance(
            $this->version,
            $payload,
            $this->solution['resourceType'],
            $this->solution['day']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Bulkexports.V1.DayContext ' . \implode(' ', $context) . ']';
    }
}