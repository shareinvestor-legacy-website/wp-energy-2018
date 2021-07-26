/**
 * Created by atthakorn on 3/1/2017.
 */


import path from 'path'
import MiniCssExtractPlugin from 'mini-css-extract-plugin'
import ManifestPlugin from 'webpack-manifest-plugin'


export default function (env) {

    return {
        context: path.resolve(__dirname, '../../'),


        entry: {
            'vendor': './public/themes/default/resources/vendor',
            'theme': './public/themes/default/resources/theme',
            'cookie': './public/themes/default/resources/cookie'
        },

        output: {

            filename: '[name].[contenthash].js',
            path: path.resolve(__dirname, '../../public/themes/default/assets'),
            sourceMapFilename: '[file].map',

        },

        resolve: {

            extensions: ['.js', '.css', '.scss', '.vue'],

        },


        module: {
            rules: [

                {
                    //theme:asset
                    test: /\.js$/,
                    include: /resources/,
                    exclude: /resources\/vendor\//,
                    use: 'babel-loader' //use babel loader to preserve sourcemap
                },
                {
                    //theme:vendor
                    test: /\.js$/,
                    include: /resources\/vendor\//,
                    use: 'script-loader'
                },


                {
                    test: /\.(css|scss)/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        'sass-loader'
                    ]
                },

                {
                    //theme:fonts
                    test: /\.(eot|ttf|woff|woff2)$/,
                    include: /themes\/default\/resources/,
                    use: "file-loader?name=fonts/[name].[ext]"

                },
                {
                    //theme:images
                    test: /\.(svg|png|jpg|gif)$/,
                    include: /themes\/default\/resources/,
                    use: "file-loader?name=images/[name].[ext]"
                }
            ]
        },


        plugins: [


            new MiniCssExtractPlugin({
                // Options similar to the same options in webpackOptions.output
                // both options are optional
                filename: "[name].[contenthash].css",
            }),
            new ManifestPlugin({
                fileName: 'stats.json',
                publicPath: '/themes/default/assets/',
                basePath: '/themes/default/assets/',
            }),

        ],
    }
}

