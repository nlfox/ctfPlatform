/**
 * Created by li_rz on 2015/8/23.
 * Copyright 2015 [Runzhi Li]
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
smchuncai.shell = (function () {
    'use strict';
    // ---------------------------- 变量声明及定义 ---------------------------------
    var stateMap = {
            $container : undefined,
            main_html : '<div id="smchuncai" draggable="true" style="position: fixed;right:90px;float:right;bottom:90px;"  >' +
                            '<div class="smchuncai-body">' +
                                '<div class="smchuncai-speak">' +
                                    '<div class="smchuncai-speak-contain">' +
                                        '<div class="smchuncai-speak-contain-menu">' +
                                            '<ul>' +
                                                '<li>博客首页</li>' +
                                                '<li>源码下载</li>' +
                                                '<li>小埋卖萌</li>' +
                                                '<li>隐藏小埋</li>' +
                                            '</ul>' +
                                        '</div>' +
                                        '<div class="smchuncai-speak-contain-said">' +
                                        '</div>' +
                                        '<div class="smchuncai-speak-contain-show-button">' +
                                            '<p>菜单</p>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="smchuncai-speak-from">' +
                                    '</div>' +
                                '</div>' +
                                '<div class="smchuncai-img-contain">' +
                                    '<img src="img/002.png" alt="umaru" draggable="false"/>' +
                                    '<img src="img/003.png" alt="umaru" draggable="false"/>' +
                                    '<img src="img/004.png" alt="umaru" draggable="false"/>' +
                                    '<img src="img/005.png" alt="umaru" draggable="false"/>' +
                                '</div>' +
                            '</div>' +
                            '<div>' +
                                '<button class="smchuncai-call-doll">召唤小埋</button>' +
                            '</div>' +
                        '</div>'
        },
        jQueryMap = {},
        setJqueryMap,
        initModule;

    window.var = {
        timeChange : null,
        change : true,
        resume : true,
        timeShowWord : null,
        timeShowButton : null
    };
    // ---------------------------- 结束变量声明与定义 -----------------------------

    // ---------------------------- DOM 方法 -------------------------------------
    // Function setJqueryMap
    // Parameter : none
    // Direction : save jQuery object smchuncai
    // Return : none
    setJqueryMap = function () {
        var $container = stateMap.$container;
        jQueryMap = {
            $container : $container
        }
    };


    // ---------------------------- 结束 DOM 方法 ---------------------------------

    // ---------------------------- 事件控制 --------------------------------------


    // -------------------------- 结束事件控制 ------------------------------------

    // -------------------------- 公共方法 ----------------------------------------

    initModule = function () {
        $('body').append(stateMap.main_html);
        var $container = $('#smchuncai');
        stateMap.$container = $container;
        setJqueryMap();
        smchuncai.menu.initModule($container);
        smchuncai.move.initModule($container);
        smchuncai.change.initModule($container);
        smchuncai.word.initModule($container);
    };

    // -------------------------- 结束公共方法 ------------------------------------
    return {
        initModule : initModule
    };
}());