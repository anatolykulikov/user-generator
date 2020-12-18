const path = require('path');
const miniCssExtractLoader = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const NODE_ENV = process.env.NODE_ENV;

module.exports = {
  mode: NODE_ENV ? NODE_ENV : 'development',
  entry: path.resolve(__dirname, 'src', 'index.ts'),
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js',
  },
  watch: true,
  watchOptions: {
    ignored: /node_modules/,
    poll: 1000
  },
  resolve: {
    extensions: ['.js', '.jsx', '.ts', '.tsx', '.json'],
    alias: {
      components: path.resolve(__dirname, 'src', 'components'),
    },
  },
  module: {
    rules: [{
        test: /\.[tj]sx?$/,
        exclude: /node_modules/,
        use: ['ts-loader'],
      },
      {
        test: /\.scss$/,
        use: [
          'style-loader',
          miniCssExtractLoader.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              plugins: [
                autoprefixer()
              ],
              sourceMap: true
            }
          },
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new miniCssExtractLoader({
      filename: 'style.css',
    })
  ],
  devtool: 'sourse-map',
};