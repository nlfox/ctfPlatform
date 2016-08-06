/**
 * Created by li_rz on 2015/10/29.
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

smchuncai.word = (function() {
    // ------------------------ 变量定义与声明 -----------------------------
    var jQuery_map = {
            $container : null,
            $menu_element : null
        },
        clickLink,
        showWord,
        showMenu,
        hideMenu,
        hideDoll,
        pauseWord,
        initModule;

    // ---------------------- 结束变量定义与声明 -----------------------------

    // ---------------------- DOM 方法 -------------------------------


    // Function clickLink
    // Parameter : $menu_element : jQuery object smchuncai speak contain
    // Direction : add event listener in every menu item,
    //             include jump link, hide smchuncai, show special sentences and show smchuncai
    // Return : none
    clickLink = function ($menu_element) {
        var menu = $menu_element.find('.smchuncai-speak-contain-menu'),
            menu_item = menu.find('ul li'),
            menu_show_button = $menu_element.find('.smchuncai-speak-contain-show-button');
        menu_item.on('click', function (event) {
            window.var.resume = false;
            event.cancelBubble = true;
            if (event.target === menu_item[0]) {
                window.location = 'http://www.cnblogs.com/lfk-dsk/';
            } else if (event.target === menu_item[1]) {
                window.location = 'https://github.com/lfkdsk/';
            } else if (event.target === menu_item[menu_item.length - 1]) {
                hideDoll(jQuery_map.$container);
            } else {
                showWord($menu_element);
                smchuncai.change.pauseTime();


                window.var.timeShowWord = setTimeout(function () {
                    smchuncai.change.resumeTime(jQuery_map.$container);
                }, 20000);
            }
        });


        menu_show_button.on('click', function (event) {
            window.var.resume = false;
            var $container = jQuery_map.$container;
            event.cancelBubble = true;

            showMenu($menu_element);
            smchuncai.change.pauseTime();
            smchuncai.change.setImg($container, 0);


            window.var.timeShowButton = setTimeout(function () {
                hideMenu($menu_element);
                smchuncai.change.resumeTime($container);
            }, 20000);
        });
    };




    // ---------------------- 结束 DOM 方法 ---------------------------

    // ---------------------- 事件 ------------------------------


    // Function showMenu
    // Parameter : $menu_element : jQuery object smchuncai speak contain
    // Direction : hide said and show menu
    // Return : none
    showMenu = function ($menu_element) {
        var menu = $menu_element;

        menu.find('.smchuncai-speak-contain-menu').get(0).style.display = 'block';
        menu.find('.smchuncai-speak-contain-said').get(0).style.display = 'none';
    };

    // Function hideMenu
    // Parameter : $menu_element : jQuery object smchuncai speak contain
    // Direction : when times up, hide menu and show said
    // Return : none
    hideMenu = function($menu_element) {
        smchuncai.change.pauseTime();
        $menu_element.find('.smchuncai-speak-contain-menu').get(0).style.display = 'none';
        $menu_element.find('.smchuncai-speak-contain-said').get(0).style.display = 'block';
    };

    // Function showWord
    // Parameter : $menu_element : jQuery object smchuncai speak contain
    // Direction : show special sentences and hide menu
    // Return : none
    showWord = function ($menu_element) {
        var menu_said =  $menu_element.find('.smchuncai-speak-contain-said');
        $menu_element.find('.smchuncai-speak-contain-menu').get(0).style.display = 'none';
        menu_said.get(0).style.display = 'block';
        menu_said.html('<p>Dive</p>');
    };

    // Function hideDoll
    // Parameter : $container : jQuery object smchuncai
    // Direction : hide smchuncai and show 'show smchuncai' button
    // Return : none
    hideDoll = function ($container) {
        var $container_body = $container.find('.smchuncai-body'),
            $container_button = $container.find('.smchuncai-call-doll');
        $container_body.get(0).style.display = 'none';
        $container_button.get(0).style.display = 'block';
    };
    // --------------------- 结束事件 ----------------------------

    // --------------------- 公共方法 ----------------------------

    // Function pauseWord
    // Parameter : none
    // Direction : stop hide menu and show word
    // Return : none
    pauseWord = function () {

        clearTimeout(window.var.timeShowButton);
        clearTimeout(window.var.timeShowWord);
    };

    initModule = function ($container) {
        jQuery_map.$container = $container;
        jQuery_map.$menu_element = $container.find('.smchuncai-speak-contain');
        clickLink(jQuery_map.$menu_element);
    };

    // -------------------- 结束公共方法 --------------------------
    return {
        initModule: initModule,
        pauseWord : pauseWord
    };
}());