import path from 'path'
import webpack from 'webpack'
import webpackMerge from 'webpack-merge'
import base from './base.babel'
import CleanWebpackPlugin from 'clean-webpack-plugin'
import CopyWebpackPlugin from 'copy-webpack-plugin'


export default function (env) {

    return webpackMerge(base(), {

        mode: 'production',
        devtool: 'cheap-module-source-map',


        plugins: [

            new CleanWebpackPlugin(['assets'], {
                root: path.resolve(__dirname, '../../public'),
            }),


            new CopyWebpackPlugin([
                {
                    //admin:static
                    context: 'resources/assets',
                    from: '@(images)/**/*',
                    to: 'static'
                },
                {
                    //admin:legacy
                    context: 'resources/assets/vendor',
                    from: '@(barryvdh|codemirror|tinymce)/**/*',
                    to: 'vendor'
                },

            ]),



        ],
    })
};


