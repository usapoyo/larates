<?php

class BaseController extends Controller {

	/**
	 * コントローラーにより使用されるレイアウトの設定.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
     * Message Bag
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    public function __construct()
    {
        $this->messageBag = new Illuminate\Support\MessageBag();
    }

}
