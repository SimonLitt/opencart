<?php
/**
 * @package      OpenCart
 *
 * @author       Daniel Kerr
 * @copyright    Copyright (c) 2005 - 2022, OpenCart, Ltd. (https://www.opencart.com/)
 * @license      https://opensource.org/licenses/GPL-3.0
 *
 * @see         https://www.opencart.com
 */
namespace Opencart\System\Engine;
/**
 * Class Controller
 *
 * @mixin \Opencart\System\Engine\Registry
 */
class Controller {
	/**
	 * @var \Opencart\System\Engine\Registry
	 */
	protected \Opencart\System\Engine\Registry $registry;

	/**
	 * Constructor
	 *
	 * @param \Opencart\System\Engine\Registry $registry
	 */
	public function __construct(\Opencart\System\Engine\Registry $registry) {
		$this->registry = $registry;
	}

	/**
	 * __get
	 *
	 * @param string $key
	 *
	 * @return object
	 */
	public function __get(string $key): object {
		if (!$this->registry->has($key)) {
			throw new \Exception('Error: Could not call registry key ' . $key . '!');
		}

		return $this->registry->get($key);
	}

	/**
	 * __set
	 *
	 * @param string $key
	 * @param object $value
	 *
	 * @return void
	 */
	public function __set(string $key, object $value): void {
		$this->registry->set($key, $value);
	}

	/**
	 * commonControls
	 *
	 * Loads controls into the $data
	 *
	 * @param array $data Reference to the contol data
	 *
	 * @return void
	 */
	protected function commonControls(array &$data): void {
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
	}
}
