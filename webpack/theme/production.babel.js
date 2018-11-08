import path from 'path'
import webpackMerge from 'webpack-merge'
import base from './base.babel'
import CleanWebpackPlugin from 'clean-webpack-plugin'
import CopyWebpackPlugin from 'copy-webpack-plugin'
import OptimizeCssAssetsPlugin from 'optimize-css-assets-webpack-plugin'

export default function (env) {

    return webpackMerge(base(), {

        mode: 'production',
        devtool: 'cheap-module-source-map',


        plugins: [

            new CleanWebpackPlugin(['assets'], {
                root: path.resolve(__dirname, '../../public/themes/default'),
            }),

            new CopyWebpackPlugin([
                {
                    //theme:static
                    context: 'public/themes/default/resources',
                    from: '@(images)/**/*',
                    to: 'static'
                },
            ]),

            new OptimizeCssAssetsPlugin({
                assetNameRegExp: /(\.css)$/g,
                cssProcessor: require('cssnano'),
                canPrint: true
            }),
        ],
    })
};


