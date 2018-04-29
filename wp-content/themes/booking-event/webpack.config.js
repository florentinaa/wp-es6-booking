const path = require('path');
const webpack = require('webpack');

const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const LodashModuleReplacementPlugin = require('lodash-webpack-plugin');

module.exports = (env, argv) => {
    let isDev = argv.mode === 'development';

    return {
        entry: {
            app: './app/main.js'
        },

        output: {
            path: path.resolve(__dirname, 'build'),
            filename: '[name].bundle.js'
        },

        optimization: {
            splitChunks: {
                cacheGroups: {
                    commons: {
                        test: /[\\/]node_modules[\\/]/,
                        name: 'vendor',
                        chunks: 'all'
                    },

                    styles: {
                        name: 'styles',
                        test: /\.css$/,
                        chunks: 'all',
                        enforce: true
                    }
                }
            },

            minimizer: isDev ? [] : [
                new UglifyJsPlugin({
                    cache: true,
                    parallel: true,
                    sourceMap: false
                }),
                new OptimizeCSSAssetsPlugin()
            ]
        },

        plugins: [
            new MiniCssExtractPlugin({
                filename: "[name].css"
            }),
            new LodashModuleReplacementPlugin
        ],
        
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: [
                        'babel-loader'
                    ]
                },

                {
                    test: /\.scss$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: 'postcss-loader',
                            options: {
                                ident: 'postcss',
                                plugins: (loader) => [
                                    require('autoprefixer')()
                                ]
                            }
                        },
                        'sass-loader'
                    ],
                },

                {
                    test: /\.(png|woff|woff2|eot|ttf|svg|jpg|gif)$/,
                    use: [{
                        loader: 'url-loader',
                        options: {
                            limit: 100000,
                            name: '[name].[ext]'
                        }
                    }]
                }
                
            ]
        }
    };  
};