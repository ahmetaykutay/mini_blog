const webpack = require("webpack")
const path = require('path')

const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  entry: "./src/js/app.js",
  output: {
    path: path.resolve(__dirname, "public"),
    filename: "js/main.js",
    publicPath: "public"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['es2015', 'stage-2']
          }
        }
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      // Options similar to the same options in webpackOptions.output
      // both options are optional
      filename: "css/[name].css",
      chunkFilename: "css/[id].css",
    })
  ],
  devtool: "source-map",
  devServer: {
    contentBase: path.join(__dirname, 'public'),
    publicPath: '/public/',
    compress: true,
    port: 8888,
  },
  optimization: {
    minimizer: [
      new UglifyJsPlugin()
    ]
  }
}