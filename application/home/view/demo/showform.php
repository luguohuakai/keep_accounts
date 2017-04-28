<!--<link rel="stylesheet" href="/assets/prism-gh-pages/themes/prism-okaidia.css">-->
<link rel="stylesheet" href="/assets/prism-gh-pages/themes/prism-dark.css">
<link rel="stylesheet" href="/assets/prism-gh-pages/plugins/line-numbers/prism-line-numbers.css">
<script src="/assets/prism-gh-pages/prism.js"></script>
<script src="/assets/prism-gh-pages/components/prism-php.min.js"></script>
<script src="/assets/prism-gh-pages/plugins/line-numbers/prism-line-numbers.min.js"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><code>Panel title</code></h3>
    </div>
    <div class="panel-body">
<pre>
<code class="line-numbers language-php">// 获取系统信息
public function getSysInfo(){
    $command_arr = ['arch', 'uname', 'hostname'];

    for($i=0; $i < count($command_arr); $i++) {
        $system_msg[$command_arr[$i]] = exec($command_arr[$i]);
    }
    $system_msg['core'] = exec("grep 'core id' /proc/cpuinfo | sort -u | wc -l");
    $system_msg['uname_r'] = exec("uname -r");
    $system_msg['branch'] = exec("cat /etc/redhat-release");
    $system_msg['version'] = exec("uname -r");
    $system_msg['ip'] = $_SERVER['HTTP_HOST'];

    return $system_msg;
}
<var>y</var> = <var>m</var><var>x</var> + <var>b</var>
</code></pre>
<samp>This text is meant to be treated as sample output from a computer program.</samp>
<code>$a = $b + $c;</code>
    </div>
</div>
<!-- 表单 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><kbd>表单</kbd></h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">

            <div class="form-group">
                <label class="control-label col-sm-2" for="simpleInput">普通输入</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="simpleInput" style="">
                </div>
            </div>

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-2" for="inputSuccess3">Input with success</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputSuccess3" aria-describedby="inputSuccess3Status">
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                </div>
            </div>

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-2" for="inputGroupSuccess2">Input group with success</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                    </div>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
                </div>
            </div>

            <div class="form-group has-warning has-feedback">
                <label class="control-label  col-sm-2" for="inputWarning2">Input with warning</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputWarning2" aria-describedby="inputWarning2Status">
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                    <span id="inputWarning2Status" class="sr-only">(warning)</span>
                </div>
            </div>

            <div class="form-group has-error has-feedback">
                <label class="control-label col-sm-2" for="inputError2">Input with error</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputError2" aria-describedby="inputError2Status">
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="inputError2Status" class="sr-only">(error)</span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="inputSuccess3">复选 单选</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                    </div>
                    <div class="checkbox disabled">
                        <label>
                            <input type="checkbox" value="" disabled>
                            Option two is disabled
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>
                    <div class="radio disabled">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                            Option three is disabled
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="exampleInputFile">文件</label>
                <div class="col-sm-9">
                    <div class="form-control">
                        <input type="file" class="" id="exampleInputFile">
<!--                        <p class="help-block">Example block-level help text here.</p>-->
                    </div>
                </div>
            </div>

        </form>

    </div>
</div>

<!-- 内联表单 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><mark>内联表单</mark></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="exampleInputName2">Name</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                    </div>
                    <button type="submit" class="btn btn-default">Send invitation</button>
                </form>
            </div>

            <div class="col-md-9 col-md-offset-2">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#simpleInput").focus();
    })
</script>