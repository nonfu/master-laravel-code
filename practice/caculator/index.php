<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>网页版在线计算器</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/calc.js"></script>
    <script type="text/javascript" src="js/bdjs_client.js"></script>
</head>
<body>

<div id="calculator_base" style="display: block">
    <div id="calculator_base_cup">
        <div id="calculator_base_container">
            <table id="base_table_top" class="calculator_table" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr><td colspan="3" style="height:17px;"></td></tr>
                <tr>
                    <td colspan="3" style="height:60px;">
                        <input type="text" id="resultIpt" readonly class="displayCss" width="390" value="0" size="17" maxlength="17" style="height:53px;*height:56px;">
                    </td>
                </tr>
                <tr class="topRowCss" style="display:none;">
                    <td width="117" valign="middle"></td>
                    <td id="baseEprsPanel" valign="middle" width="290" style="text-align:right"></td>
                    <td width="30"></td>
                </tr>
                <tr><td colspan="3" style="height:40px;">&nbsp;</td>
                </tr>
                </tbody></table>
            <table id="base_table_main" class="calculator_table" align="center" cellpadding="0" cellspacing="0" border="0" style="width:96%;">
                <tbody><tr>
                    <td><input type="button" value="存储" onclick="calculator.memory(this,0);" class="baseBtnCommonCss"></td>
                    <td><input type="button" value="取存" onclick="calculator.memory(this,1);" class="baseBtnCommonCss"></td>
                    <td><input type="button" id="simpleDel" value="退格" onclick="calculator.remove();" class="baseBtnCommonCss baseBtnCss1"></td>
                    <td><input type="button" id="simpleClearAllBtn" value="清屏" onclick="calculator.clearAll();" class="baseBtnCommonCss baseBtnCss1" style="color: rgb(255, 255, 255); background-position: 0px -44px; "></td>
                </tr>
                <tr>
                    <td><input type="button" value="累存" onclick="calculator.memory(this,-1);" class="baseBtnCommonCss"></td>
                    <td><input type="button" value="积存" onclick="calculator.memory(this,-2);" class="baseBtnCommonCss"></td>
                    <td><input type="button" value="清存" onclick="calculator.memory(this,2);" class="baseBtnCommonCss"></td>
                    <td><input type="button" id="simpleDivi" value="÷" onclick="calculator.input(this,3);" class="baseBtnCommonCss baseBtnCss2"></td>
                </tr>
                <tr>
                    <td><input type="button" id="simple7" value="7" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple8" value="8" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple9" value="9" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3" style="color: rgb(255, 255, 255); background-position: 0px -44px; "></td>
                    <td><input type="button" id="simpleMulti" value="×" onclick="calculator.input(this,2);" class="baseBtnCommonCss baseBtnCss2"></td>
                </tr>
                <tr>
                    <td><input type="button" id="simple4" value="4" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple5" value="5" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple6" value="6" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simpleSubtr" value="-" onclick="calculator.input(this,1);" class="baseBtnCommonCss baseBtnCss2"></td>
                </tr>
                <tr>
                    <td><input type="button" id="simple1" value="1" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple2" value="2" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simple3" value="3" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simpleAdd" value="+" onclick="calculator.input(this,0);" class="baseBtnCommonCss baseBtnCss2"></td>
                </tr>
                <tr>
                    <td><input type="button" id="simple0" value="0" onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simpleDot" value="." onclick="calculator.input(this,-1);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" value="+/-" onclick="calculator.input(this,-3);" class="baseBtnCommonCss baseBtnCss3"></td>
                    <td><input type="button" id="simpleEqual" value="=" onclick="calculator.input(this,-2);" class="baseBtnCommonCss baseBtnCss4"></td>
                </tr>
                </tbody></table>
        </div>
        <div class="calculator_tab" id="calculator_tabs">
            <ul>
                <li>基础</li>
                <li class="selTabBottom" onclick="showCalculator(1);">高级</li>
            </ul>
        </div>
    </div>
</div>
<div id="calculator_complete" style="display: none; position: relative; ">
    <div id="calculator_complete_cup">
        <div id="calculator_complete_container" style="height: 578px; ">
            <form id="completeFrm" name="calc" style="margin:0px;padding:0px;">
                <div id="complete_button_panel">
                    <table id="complete_table_top" class="calculator_table" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;">
                        <tbody><tr><td colspan="3" style="height:17px;"></td></tr>
                        <tr>
                            <td colspan="3" style="height:60px;">
                                <input type="text" name="display" readonly value="0" class="displayCss" size="17" maxlength="17">
                            </td>
                        </tr>
                        <tr class="topRowCss" style="display:none;">
                            <td width="117" valign="middle">&nbsp;</td>
                            <td id="completeEprsPanel" valign="middle" width="290" style="text-align:right"></td>
                            <td width="30"></td>
                        </tr>
                        <tr><td style="height:40px;*height:47px;" colspan="3">&nbsp;</td></tr>
                        </tbody></table>
                    <table id="complete_table_rdo" align="center" class="calculator_table" cellpadding="0" cellspacing="0" border="0" style="width:96%;height:30px;">
                        <tbody><tr>
                            <td><input type="radio" name="carry" id="carry16" onclick="inputChangCarry(16);"><label for="carry16">十六进制</label></td>
                            <td><input type="radio" name="carry" id="carry10" onclick="inputChangCarry(10);" checked="checked"><label for="carry10">十进制</label></td>
                            <td><input type="radio" name="carry" id="carry8" onclick="inputChangCarry(8);"><label for="carry8">八进制</label></td>
                            <td><input type="radio" name="carry" id="carry2" onclick="inputChangCarry(2);"><label for="carry2">二进制</label></td>
                            <td width="10%"></td>
                            <td><input type="radio" name="angle" id="angleid" checked="checked" value="d" onclick="inputChangAngle('d')"><label for="angleid">角度制</label></td>
                            <td><input type="radio" name="angle" id="angleid2" value="r" onclick="inputChangAngle('r');"><label for="angleid2">弧度制</label></td>
                        </tr>
                        </tbody></table>
                    <table id="complete_table_chk" align="center" class="calculator_table" cellpadding="0" cellspacing="0" border="0" style="width:96%;height:30px;">
                        <tbody><tr>
                            <td><input type="checkbox" name="shiftf" id="shiftid" onclick="inputshift();"><label for="shiftid" style="color:#FFF;">上档功能</label></td>
                            <td><input type="checkbox" name="hypf" id="hypfid" onclick="inputshift();"><label for="hypfid" style="color:#FFF;">双曲函数</label></td>
                            <td>
                                <div style="float:left;"><input type="text" name="bracket" readonly size="3" class="helperBox" value=""></div>
                                <div style="float:left;"><input type="text" name="memory" readonly size="3" class="helperBox"></div>
                                <div style="float:left;"><input type="text" name="operator" readonly size="3" class="helperBox" style="width:45px;" id="operatorIpt"></div>
                            </td>
                            <td><input type="button" id="completeDel" value="退格" onclick="backspace();" class="completeBtnCommonCss"></td>
                            <td><input type="button" value="清屏" onclick="document.calc.display.value=0;document.getElementById('completeEprsPanel').innerHTML = '';this.blur();" class="completeBtnCommonCss"></td>
                        </tr>
                        </tbody></table>
                    <table id="complete_table_main" class="calculator_table" align="center" cellpadding="0" cellspacing="0" border="0" style="width:97%;*margin-top:2px;">
                        <tbody><tr>
                            <td><input type="button" value="存储" onclick="putmemory();" class="completeBtnCommonCss completeBtnCss1"></td>
                            <td><input type="button" value="取存" onclick="getmemory();" class="completeBtnCommonCss completeBtnCss1"></td>
                            <td><input type="button" value="累存" onclick="addmemory();" class="completeBtnCommonCss completeBtnCss1"></td>
                            <td><input type="button" value="积存" onclick="multimemory();" class="completeBtnCommonCss completeBtnCss1"></td>
                            <td><input type="button" value="清存" onclick="clearmemory();" class="completeBtnCommonCss completeBtnCss1"></td>
                            <td><input type="button" value="全清" onclick="clearall();" class="completeBtnCommonCss"></td>
                        </tr>
                        <tr>
                            <td><input type="button" id="complete7" name="k7" value="7" onclick="inputkey('7');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="complete8" name="k8" value="8" onclick="inputkey('8');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="complete9" name="k9" value="9" onclick="inputkey('9');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="completeDivi" value="÷" onclick="operation('/',6);" class="completeBtnCommonCss completeBtnCss3"></td>
                            <td><input type="button" value="取余" onclick="operation('%',6);" class="completeBtnCommonCss"></td>
                            <td><input type="button" value="与" onclick="operation('&amp;',3);" class="completeBtnCommonCss"></td>
                        </tr>
                        <tr>
                            <td><input type="button" id="complete4" name="k4" value="4" onclick="inputkey('4');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="complete5" name="k5" value="5" onclick="inputkey('5');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="complete6" name="k6" value="6" onclick="inputkey('6');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="completeMulti" value="×" onclick="operation('*',6);" class="completeBtnCommonCss completeBtnCss3"></td>
                            <td><input type="button" value="取整" name="floor" onclick="inputfunction('floor','deci');" class="completeBtnCommonCss"></td>
                            <td><input type="button" value="或" onclick="operation('|',1);" class="completeBtnCommonCss"></td>
                        </tr>
                        <tr>
                            <td><input type="button" id="complete1" name="k1" value="1" onclick="inputkey('1');" class="completeBtnCommonCss completeBtnCss2"></td>
                            <td><input type="button" id="complete2" name="k2" value="2" onclick="inputkey('2');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="complete3" name="k3" value="3" onclick="inputkey('3');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="completeSubtr" value="-" onclick="operation('-',5);" class="completeBtnCommonCss completeBtnCss3"></td>
                            <td><input type="button" value="左移" onclick="operation('&lt;',4);" class="completeBtnCommonCss"></td>
                            <td><input type="button" value="非" onclick="inputfunction('~','~');" class="completeBtnCommonCss"></td>
                        </tr>
                        <tr>
                            <td><input type="button" id="complete0" name="k0" value="0" onclick="inputkey('0');" class="completeBtnCommonCss completeBtnCss2"></td>
                            <td><input type="button" value="+/-" onclick="changeSign();" class="completeBtnCommonCss completeBtnCss2"></td>
                            <td><input type="button" id="completeDot" name="kp" value="." onclick="inputkey('.');" class="completeBtnCommonCss completeBtnCss2" style="color: rgb(255, 255, 255); background-image: url(images/e3btn.gif); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" id="completeAdd" value="+" onclick="operation('+',5);" class="completeBtnCommonCss completeBtnCss3"></td>
                            <td><input type="button" id="completeEqual" value="=" onclick="result();" class="completeBtnCommonCss completeBtnCss4"></td>
                            <td><input type="button" value="异或" onclick="operation('x',2);" class="completeBtnCommonCss"></td>
                        </tr>
                        <tr>
                            <td><input type="button" name="ka" value="A" onclick="inputkey('a');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" name="kb" value="B" onclick="inputkey('b');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" name="kc" value="C" onclick="inputkey('c');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" name="kd" value="D" onclick="inputkey('d');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" name="ke" value="E" onclick="inputkey('e');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                            <td><input type="button" name="kf" value="F" onclick="inputkey('f');" class="completeBtnCommonCss" disabled="" style="color: rgb(172, 168, 153); background-image: url(images/e3btn-dis.gif); cursor: default; background-position: 0px 0px; background-repeat: no-repeat no-repeat; "></td>
                        </tr>
                        <tr><td style="height:11px;" colspan="6"></td></tr>
                        </tbody></table>
                </div>
                <table id="complete_table_more" class="calculator_table" align="center" cellpadding="0" cellspacing="0" border="0" style="width:90%;*margin-top:2px;">
                    <tbody id="moreFn">
                    <tr>
                        <td><input type="button" name="pi" value="PI" onclick="inputfunction('pi','pi');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                        <td><input type="button" name="e" value="E" onclick="inputfunction('e','e');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                        <td><input type="button" name="bt" value="d.ms" onclick="inputfunction('dms','deg');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                        <td><input type="button" value="(" onclick="addbracket(this);" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" value=")" onclick="disbracket(this);" class="completeBtnCommonCss completeBtnCss5"></td>
                    </tr>
                    <tr>
                        <td><input type="button" name="ln" value="ln" onclick="inputfunction('ln','exp');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" name="log" value="log" onclick="inputfunction('log','expdec');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" name="sin" value="sin" onclick="inputtrig('sin','arcsin','hypsin','ahypsin');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                        <td><input type="button" name="cos" value="cos" onclick="inputtrig('cos','arccos','hypcos','ahypcos');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                        <td><input type="button" name="tan" value="tan" onclick="inputtrig('tan','arctan','hyptan','ahyptan');" class="completeBtnCommonCss completeBtnCss5" style="color: rgb(255, 255, 255); background-image: url(images/e5btn.jpg); cursor: pointer; background-position: 0px -34px; background-repeat: no-repeat no-repeat; "></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="n!" onclick="inputfunction('!','!');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" value="1/x" onclick="inputfunction('recip','recip');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" name="sqr" value="x^2" onclick="inputfunction('sqr','sqrt');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" name="cube" value="x^3" onclick="inputfunction('cube','cubt');" class="completeBtnCommonCss completeBtnCss5"></td>
                        <td><input type="button" value="x^y" onclick="operation('^',7);" class="completeBtnCommonCss completeBtnCss5"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="calculator_tab" id="calculator_tabs2">
            <ul>
                <li class="selTabBottom" onclick="showCalculator(0);">基础</li>
                <li>高级</li>
            </ul>
        </div>
    </div>
</div>


</body>
</html>
