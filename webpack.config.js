const Path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: {
    theme: './wp-content/themes/keyo_test-child/scss/style.scss'
  },
  output: {
    path: Path.resolve(__dirname, 'wp-content/themes/keyo_test-child'),
    filename: 'js/build-garbage.js'
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              api: 'modern'
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'scss/style.css'
    })
  ]
};