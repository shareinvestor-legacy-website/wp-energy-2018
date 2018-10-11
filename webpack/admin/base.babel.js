/**
 * Created by atthakorn on 3/1/2017.
 */



import path from 'path'
import MiniCssExtractPlugin from 'mini-css-extract-plugin'



export default function (env) {

    return {
        context: path.resolve(__dirname, '../../'),


        entry: {

            'jquery': './resources/assets/vendor/jquery/dist/jquery',
            'vendor': './resources/assets/vendor.js',
            'admin': './resources/assets/index.js',
        },

        output: {

            filename: '[name].js',
            path: path.resolve(__dirname, '../../public/assets'),
            sourceMapFilename: '[file].map',

        },

        resolve: {

            extensions: ['.js', '.css', '.scss'],
            alias: {
                moment: path.resolve(__dirname, '../../resources/assets/vendor/moment/moment.js')
            }
        },


        module: {
            rules: [
                {
                    //admin:vendor
                    test: /\.js$/,
                    include: /assets\/vendor\//,
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
                    //admin:fonts
                    test: /\.(eot|ttf|woff|woff2)$/,
                    include: /resources\/assets/,
                    use: "file-loader?name=fonts/[name].[ext]"

                },
                {
                    //admin:images
                    test: /\.(svg|png|jpg|gif)$/,
                    include: /resources\/assets/,
                    use: "file-loader?name=images/[name].[ext]"
                },

            ]
        },


        plugins: [

            new MiniCssExtractPlugin({
                // Options similar to the same options in webpackOptions.output
                // both options are optional
                filename: "[name].css",
            }),



        ],
    }
}

