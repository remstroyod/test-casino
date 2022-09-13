'use strict';

/******************************************************************
 * Home
 * @type {{init: User.init, install: User.install}}
 * @since 1.0
 * @author Alex Cherniy
 * @date 13.09.2022
 */
var User = {

	/**
	 * Init
	 */
	init: function ()
	{

		this.install  = this.install( this )

	},

	/**
	 * Install
	 */
	install: function() {

		$( document ).on(
			'click',
			'.goSpin',
			this.spin )

		$( document ).on(
			'click',
			'.getHistory',
			this.history )

	},

	/**
	 * Spin
	 */
	spin: function(e)
	{

		e.preventDefault()

		const $this = $(this),
				url = $this.attr('href'),
				$container = $('.ajaxContainer')

		$.ajax( {
			beforeSend: function(xhr)
			{

				$container.addClass('preload')
				$this.addClass('disabled')
				$this.attr('disabled')

			},
			data: {},
			headers     :   {
				"Content-Type": "application/x-www-form-urlencoded"
			},
			dataType: 'json',
			method: 'POST',
			complete: function()
			{

				$container.removeClass('preload')
				$this.removeClass('disabled')
				$this.removeAttr('disabled')

			},
			error: function(response)
			{


			},
			success: function( response )
			{

				console.dir(response)
				$container.find('.result').html(response.html)

			},
			url: url
		} )

		return false;


	},

	/**
	 * History
	 */
	history: function(e)
	{

		e.preventDefault()

		const $this = $(this),
			url = $this.attr('href'),
			$container = $('.ajaxContainer')

		$.ajax( {
			beforeSend: function(xhr)
			{

				$container.addClass('preload')
				$this.addClass('disabled')
				$this.attr('disabled')

			},
			data: {},
			headers     :   {
				"Content-Type": "application/x-www-form-urlencoded"
			},
			dataType: 'json',
			method: 'GET',
			complete: function()
			{

				$container.removeClass('preload')
				$this.removeClass('disabled')
				$this.removeAttr('disabled')

			},
			error: function(response)
			{


			},
			success: function( response )
			{

				console.dir(response)
				$container.find('.result').html(response.html)

			},
			url: url
		} )

		return false;


	},

}

User.init()
