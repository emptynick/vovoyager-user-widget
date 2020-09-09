const path = require('path')

module.exports = {
  mode: process.env.NODE_ENV,
  entry: [
    path.resolve(__dirname, './resources/scripts.js'),
  ],
  output: {
    path: path.resolve(__dirname, './resources/dist'),
    filename: 'scripts.js'
  },
  resolve: {
    extensions: ['.vue', '.js', '.json', '.scss'],
  },
  performance: {
    hints: false,
  },
  stats: {
    hash: false,
    version: false,
    timings: false,
    children: false,
    errorDetails: false,
    entrypoints: false,
    performance: process.env.NODE_ENV === 'production',
    chunks: false,
    modules: false,
    reasons: false,
    source: false,
    publicPath: false,
    builtAt: false
  },
  module: {
    rules: [
      {
        test: /\.html$/i,
        loader: 'html-loader',
        options: {
          esModule: true,
        },
      },
    ]
  },
};