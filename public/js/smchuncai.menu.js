/**
 * Created by li_rz on 2015/11/3.
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
smchuncai.menu = (function () {
    // ---------------------------- 变量声明及定义 ---------------------------------
    var allImageHide,
        initMenu,
        hideButton,
        initModule;

    // ---------------------------- 结束变量声明与定义 -----------------------------

    // ---------------------------- DOM 方法 -------------------------------------

    // Function allImageHide
    // Parameter : $container : jQuery object smchuncai
    // Direction : show first image, hide others
    // Return : none
    allImageHide = function ($container) {
        var $container_img = $container.find('img'),
            img_src = $container_img.get(0).src,
            begin_regex_img = new RegExp(img_src);

        $container_img.each(function (index, element) {
            var element_get = element.src;
            if (!begin_regex_img.test(element_get)) {
                element.style.display = 'none';
            } else {
                element.style.display = 'block';
            }
        })
    };

    // Function initMenu
    // Parameter : $container : jQuery object smchuncai
    // Direction : init smchuncai said(just once)
    // Return : none
    initMenu = function ($container) {
        var $container_menu = $container.find('.smchuncai-speak-contain'),
            $container_menu_said = $container_menu.find('.smchuncai-speak-contain-said');

        $container_menu.find('.smchuncai-speak-contain-menu').get(0).style.display = 'none';
        $container_menu_said.get(0).style.display = 'block';
        $container_menu_said.html('<p>小埋参上</p>')
    };

    // Function hideButton
    // Parameter : $container : jQuery object smchuncai
    // Direction : hide button which show smchuncai
    // Return : none
    hideButton = function ($container) {
        var $container_button = $container.find('.smchuncai-call-doll');
        $container_button.get(0).style.display = 'none';
        $container_button.on('click', function (event) {
            event.stopPropagation();
            var $body = $container.find('.smchuncai-body');
            smchuncai.change.resumeTime($container);
            $body.get(0).style.display = 'block';
            $container_button.get(0).style.display = 'none';
        });
    };



    // ---------------------------- 结束 DOM 方法 ---------------------------------

    // ---------------------------- 事件控制 --------------------------------------


    // -------------------------- 结束事件控制 ------------------------------------

    // -------------------------- 公共方法 ----------------------------------------

    initModule = function ($container) {
        allImageHide($container);
        initMenu($container);
        hideButton($container);
    };
    // -------------------------- 结束公共方法 ------------------------------------

    return {
        initModule :initModule
    }
}());