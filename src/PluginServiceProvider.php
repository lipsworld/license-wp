<?php

namespace Never5\LicenseWP;

use Never5\LicenseWP\License;
use Never5\LicenseWP\ApiProduct;
use Never5\LicenseWP\Activation;
use Never5\LicenseWP\Log;

class PluginServiceProvider implements Pimple\ServiceProviderInterface {

	/**
	 * Registers services on the given container.
	 *
	 * This method should only be used to configure services and parameters.
	 * It should not get services.
	 *
	 * @param Pimple\Container $container An Container instance
	 */
	public function register( Pimple\Container $container ) {

		// license repository
		$container['license_repository'] = function () {
			return new License\WordPressRepository();
		};

		// license factory
		$container['license_factory'] = function () use ( $container ) {
			return new License\Factory( $container['license_repository'] );
		};

		// license manager
		$container['license_manager'] = function () {
			return new License\Manager();
		};

		// email manager
		$container['email_manager'] = function () {
			return new Email\Manager();
		};

		// API Product repository
		$container['api_product_repository'] = function () {
			return new ApiProduct\WordPressRepository();
		};

		// API product factory
		$container['api_product_factory'] = function () use ( $container ) {
			return new ApiProduct\Factory( $container['api_product_repository'] );
		};

		// API product manager
		$container['api_product_manager'] = function () {
			return new ApiProduct\Manager();
		};

		// Activation repository
		$container['activation_repository'] = function () {
			return new Activation\WordPressRepository();
		};

		// Activation factory
		$container['activation_factory'] = function () use ( $container ) {
			return new Activation\Factory( $container['activation_repository'] );
		};

		// Activation manager
		$container['activation_manager'] = function () {
			return new Activation\Manager();
		};

		// Log
		$container['log'] = function () {
			return new Log\Log();
		};

	}

}