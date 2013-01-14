(function ($) {

    "use strict";

    /**
     * Score module implementation.
     *
     * @author Terrific Composer
     * @namespace Tc.Module
     * @class Score
     * @extends Tc.Module
     */
    Tc.Module.Score = Tc.Module.extend({
        /**
         * Initializes the Score module.
         *
         * @method init
         * @return {void}
         * @constructor
         * @param {jQuery} $ctx the jquery context
         * @param {Sandbox} sandbox the sandbox to get the resources from
         * @param {Number} id the unique module id
         */
        init:function ($ctx, sandbox, id) {
            // call base constructor
            this._super($ctx, sandbox, id);
        },

        /**
         * Hook function to do all of your module stuff.
         *
         * @method on
         * @param {Function} callback function
         * @return void
         */
        on:function (callback) {
            callback();
        },

        /**
         * Hook function to trigger your events.
         *
         * @method after
         * @return void
         */
        after:function () {

        }
    });
})(Tc.$);
