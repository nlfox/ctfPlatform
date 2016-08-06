/**
 * Created by li_rz on 2015/9/6.
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
smchuncai.move = (function () {
    'use strict';
    // ------------------------ 变量定义与声明 -----------------------------


    var drag = false, // whether dragging
        moveSmchuncai,
        notEnterBorder,
        initModule;

    // ---------------------- 结束变量定义与声明 -----------------------------

    // ---------------------- DOM 方法 -------------------------------

    // Function notEnterBorder
    // Parameter : 1. event : mousemove event
    //             2. distanceFromClickAndOffset : coordinate distance from mousedown and mouseup (x distance and y distance)
    //             3. containerSize : smchuncai's size
    //             4. clickDownPosition : coordinate of mousedown event
    //             5. offset : smchuncai's top and left
    //             6. $this : jQuery object smchuncai
    // Direction : not let smchuncai cross screen
    // Return : none

    notEnterBorder = function (event, distanceFromClickAndOffset, containerSize, clickDownPosition, offset, $this) {
        var enterLeft = event.clientX - distanceFromClickAndOffset.x < 0,
            enterTop = event.clientY - distanceFromClickAndOffset.y < 0,
            enterRight = event.clientX > screen.availWidth - containerSize.x + distanceFromClickAndOffset.x,
            enterBottom = event.clientY > screen.availHeight - containerSize.y + distanceFromClickAndOffset.y;

        if (enterLeft || enterTop || enterRight || enterBottom) {
            if (enterLeft) {
                $this.style.left = 0 + 'px';
            } else if (enterRight) {
                $this.style.left = screen.availWidth - containerSize.x + "px";
            } else {
                $this.style.left = offset.x + event.clientX - clickDownPosition.x + "px";
            }

            if (enterTop) {
                $this.style.top = 0 + 'px';
            } else if (enterBottom) {
                $this.style.top = screen.availHeight - containerSize.y + "px";
            } else {
                $this.style.top = offset.y + event.clientY - clickDownPosition.y + "px";
            }
        } else {
            $this.style.left = offset.x + event.clientX - clickDownPosition.x + "px";
            $this.style.top = offset.y + event.clientY - clickDownPosition.y + "px";
        }
    };


    // Function moveSmchuncai
    // Parameter : $container : jQuery object smchuncai
    // Direction : move smchuncai event control
    // Return : none
    moveSmchuncai = function($container){


        var container = $container,
            clickDownPosition = {   // 点击时鼠标坐标
                x : null,
                y : null
            },
            containerSize = {
                x :  null,
                y : null
            },
            distanceFromClickAndOffset = {
                x : null,
                y : null
            };

        containerSize.x = parseInt(container.css('width'));
        containerSize.y = parseInt(container.css('height'));

        $container.on('mousedown',  function(event){
            drag = true;
            var $this = this,

            // element position
                offset = {
                    x : $this.offsetLeft,
                    y : $this.offsetTop
                },
                resume = true,     // confirm call resumeTime once
                change = false;    // change start

            clickDownPosition.x = event.clientX;
            clickDownPosition.y = event.clientY;

            distanceFromClickAndOffset = {
                x : clickDownPosition.x - offset.x,
                y : clickDownPosition.y - offset.y
            };

            smchuncai.change.pauseTime();
            smchuncai.word.pauseWord();

            $container.on('mousemove', function(event){

                if(!drag) {
                    if (change && resume) {
                        smchuncai.change.resumeTime($container);
                        resume = false;
                    }
                    return false;
                }

               notEnterBorder(event, distanceFromClickAndOffset, containerSize, clickDownPosition, offset, $this);

            });

            $container.on('mouseup', function() {
                drag = false;
                change = true;
            });

            $container.on('mouseleave', function () {
                change = true;
                drag = false;
            });
        });
    };


    // ---------------------- 结束 DOM 方法 ---------------------------

    // ---------------------- 事件 ------------------------------





    // --------------------- 结束事件 ----------------------------

    // --------------------- 公共方法 ----------------------------


    initModule = function ($container) {
        $container.on('mouseover', moveSmchuncai($container));
    };
    // -------------------- 结束公共方法 --------------------------

    return {
        initModule: initModule
    }
}());