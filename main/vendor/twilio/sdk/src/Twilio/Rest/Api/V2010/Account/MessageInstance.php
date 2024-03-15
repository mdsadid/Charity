<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;
use Twilio\Rest\Api\V2010\Account\Message\FeedbackList;
use Twilio\Rest\Api\V2010\Account\Message\MediaList;


/**
 * @property string|null $body
 * @property string|null $numSegments
 * @property string $direction
 * @property string|null $from
 * @property string|null $to
 * @property \DateTime|null $dateUpdated
 * @property string|null $price
 * @property string|null $errorMessage
 * @property string|null $uri
 * @property string|null $accountSid
 * @property string|null $numMedia
 * @property string $status
 * @property string|null $messagingServiceSid
 * @property string|null $sid
 * @property \DateTime|null $dateSent
 * @property \DateTime|null $dateCreated
 * @property int|null $errorCode
 * @property string|null $priceUnit
 * @property string|null $apiVersion
 * @property array|null $subresourceUris
 */
class MessageInstance extends InstanceResource
{
    protected $_feedback;
    protected $_media;

    /**
     * Initialize the MessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) creating the Message resource.
     * @param string $sid The SID of the Message resource you wish to delete
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'body' => Values::array_get($payload, 'body'),
            'numSegments' => Values::array_get($payload, 'num_segments'),
            'direction' => Values::array_get($payload, 'direction'),
            'from' => Values::array_get($payload, 'from'),
            'to' => Values::array_get($payload, 'to'),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'price' => Values::array_get($payload, 'price'),
            'errorMessage' => Values::array_get($payload, 'error_message'),
            'uri' => Values::array_get($payload, 'uri'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'numMedia' => Values::array_get($payload, 'num_media'),
            'status' => Values::array_get($payload, 'status'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'dateSent' => Deserialize::dateTime(Values::array_get($payload, 'date_sent')),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'errorCode' => Values::array_get($payload, 'error_code'),
            'priceUnit' => Values::array_get($payload, 'price_unit'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
        ];

        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return MessageContext Context for this MessageInstance
     */
    protected function proxy(): MessageContext
    {
        if (!$this->context) {
            $this->context = new MessageContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Delete the MessageInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->proxy()->delete();
    }

    /**
     * Fetch the MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): MessageInstance
    {

        return $this->proxy()->fetch();
    }

    /**
     * Update the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): MessageInstance
    {

        return $this->proxy()->update($options);
    }

    /**
     * Access the feedback
     */
    protected function getFeedback(): FeedbackList
    {
        return $this->proxy()->feedback;
    }

    /**
     * Access the media
     */
    protected function getMedia(): MediaList
    {
        return $this->proxy()->media;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Api.V2010.MessageInstance ' . \implode(' ', $context) . ']';
    }
}

