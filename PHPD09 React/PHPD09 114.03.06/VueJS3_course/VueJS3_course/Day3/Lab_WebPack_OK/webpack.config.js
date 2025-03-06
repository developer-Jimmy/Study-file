const HtmlWebpackPlugin = require('html-webpack-plugin');
var webpack = require('webpack');

module.exports = {
  entry: './src/index.js',
  module: {
		rules: [
			{
				test: /.css$/,
				use: [
					'style-loader',
					'css-loader'
				]
			}
		]
	},
  plugins: [
    new HtmlWebpackPlugin({
      hash: true,
      title: 'Lab_WebPack App',
      header: 'Lab_WebPack Title',
      metaDesc: 'Lab_WebPack Description',
      template: './src/index.html',
      filename: 'index.html',
      inject: 'body'
    }),
    new webpack.ProvidePlugin({ 
			$: 'jquery',
			jQuery: 'jquery'
		})
  ],
  mode: 'development',
  output: {
    clean: true
  },
  devServer: {
    open: true
  }
};
