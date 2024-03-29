const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const MinifyPlugin = require('babel-minify-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

const PATHS = {
    source: path.join(__dirname, 'src/'),
    build: path.join(__dirname, 'dist/')
}

module.exports = {
    entry: {
      main: [
        PATHS.source + 'js/main.js',
        PATHS.source + 'sass/main.scss',
        PATHS.source + 'img/sprite.svg',
      ]
    },

    output: {
        path: PATHS.build,
        publicPath: '/wp-content/themes/mebeldomyut/dist/',
        filename: '[name].js',
        chunkFilename: '[name].js',
    },

    mode: process.env.NODE_ENV || 'development',

    resolve: {
      modules: [path.resolve(__dirname, 'src'), 'node_modules']
    },

    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.(css|sass|scss)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.(png|jpg|gif|svg|webm|mp4|ogg|ogv)/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?[hash]',
                            outputPath: 'img/'
                        }
                    }
                ]
            },
            {
                test: /\.(eot|woff|woff2|ttf|otf)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?[hash]',
                            outputPath: 'fonts/'
                        }
                    }
                ]
            }
        ]
    },

    optimization: {
        minimizer: [
            new MinifyPlugin(),
            new OptimizeCSSAssetsPlugin()
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",
            chunkFilename: "[id].css"
        }),
    ]
};
