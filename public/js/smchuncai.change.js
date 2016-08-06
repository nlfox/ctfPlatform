/**
 * Created by li_rz on 2015/10/27.
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
smchuncai.change = (function () {
    // ----------------------------- 变量声明及定义 -----------------------------
    var initModule,
        resumeTime,
        setImg,
        pauseTime;


    // ----------------------------- 结束变量声明及定义 --------------------------

    // ---------------------- DOM 方法 -------------------------------




    // ---------------------- 结束 DOM 方法 ---------------------------

    // --------------------- 公共方法 ----------------------------

    // Function resumeTime:
    // Parameter : jQuery object smchuncai
    // Direction : Start setTimeOut and make image and said change
    // Return : none
    resumeTime = function ($container) {
        var word = ['资瓷', '必续', '屠龙宝刀，点击就送', '搞个大新闻'];
        window.var.timeChange = setTimeout(function () {
            // debugger;

            var $container_img = $container.find('img'),
                $container_word = $container.find('.smchuncai-speak-contain-said'),
                next_img,
                next_word,
                i;
            for (i = 0; i < $container_img.length; ++i) {
                if ($container_img[i].style.display === 'block') {
                    next_img = $container_img[i + 1];
                    next_word = word[i + 1];
                }
            }

            // check next_img
            // if next_img === undefined
            // next_img is first
            if (!next_img) {
                next_img = $container_img[0];
                next_word = word[0];
            }

            $container_img.each(function (index, element) {
                if (element !== next_img) {
                    element.style.display = 'none';
                } else {
                    element.style.display = 'block';
                    $container_word.html('<p>' + next_word + '</p>');
                }
            });

            resumeTime($container);
        }, 20000);
    };

    // Function setImg
    // Parameter : 1. $container : jQuery object smchuncai
    //             2. num : set image' number in <li>
    // Direction : set image
    // Return : none
    setImg = function ($container, num) {
        var $container_img = $container.find('img');
        $container_img.each(function (index, element) {
            if (index === num) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    };


    // Function pauseTime
    // Parameter : none
    // Direction : stop setTimeOut
    // Return : none
    pauseTime = function () {

        clearTimeout(window.var.timeChange);
    };

    initModule = function ($container) {
        resumeTime($container);
    };
    // -------------------- 结束公共方法 --------------------------
    return {
        initModule: initModule,
        resumeTime : resumeTime,
        pauseTime : pauseTime,
        setImg : setImg
    }
}());
