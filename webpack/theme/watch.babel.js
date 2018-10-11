import webpackMerge from 'webpack-merge'
import base from './base.babel'
import BrowserSyncPlugin from 'browser-sync-webpack-plugin'
import path from 'path'
import CleanWebpackPlugin from 'clean-webpack-plugin'



export default function (env) {
    return webpackMerge(base(), {

        mode: 'development',
        devtool: 'source-map',

        plugins: [
            new CleanWebpackPlugin(['assets'], {
                root: path.resolve(__dirname, '../../public/themes/default'),
                exclude: ['fonts', 'images', 'static'],
            }),

            //port 3000, client side script configuration
            new BrowserSyncPlugin(
                {
                    reloadDebounce: 300,
                }
            ),

        ]
    });
}
