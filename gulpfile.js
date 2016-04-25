var elixir = require('laravel-elixir');

elixir.config.publicPath = './web';
elixir.config.viewPath = 'views';


/**
 * Bootstrap assets
 * @type {string}
 */

elixir.config.assetsPath = './node_modules/bootstrap/dist';

elixir(function(mix) {
  mix.styles(['bootstrap.min.css', 'bootstrap-theme.min.css']);
  mix.scripts(['bootstrap.min.js']);
});
