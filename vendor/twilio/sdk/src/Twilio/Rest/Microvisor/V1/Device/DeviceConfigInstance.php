<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Microvisor\V1\Device;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $deviceSid
 * @property string $key
 * @property string $value
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class DeviceConfigInstance extends InstanceResource {
    /**
     * Initialize the DeviceConfigInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $deviceSid A string that uniquely identifies the parent Device.
     * @param string $key The config key.
     */
    public function __construct(Version $version, array $payload, string $deviceSid, string $key = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'deviceSid' => Values::array_get($payload, 'device_sid'),
            'key' => Values::array_get($payload, 'key'),
            'value' => Values::array_get($payload, 'value'),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['deviceSid' => $deviceSid, 'key' => $key ?: $this->properties['key'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return DeviceConfigContext Context for this DeviceConfigInstance
     */
    protected function proxy(): DeviceConfigContext {
        if (!$this->context) {
            $this->context = new DeviceConfigContext(
                $this->version,
                $this->solution['deviceSid'],
                $this->solution['key']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the DeviceConfigInstance
     *
     * @return DeviceConfigInstance Fetched DeviceConfigInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): DeviceConfigInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Update the DeviceConfigInstance
     *
     * @param string $value The config value.
     * @return DeviceConfigInstance Updated DeviceConfigInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $value): DeviceConfigInstance {
        return $this->proxy()->update($value);
    }

    /**
     * Delete the DeviceConfigInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
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
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Microvisor.V1.DeviceConfigInstance ' . \implode(' ', $context) . ']';
    }
}