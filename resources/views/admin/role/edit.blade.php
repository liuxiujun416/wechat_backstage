@extends('admin.layout.layout')
@section('content')
    <div id="content-header">
        <h1>Common Form Elements</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="tip-bottom">Form elements</a>
        <a href="#" class="current">Common elements</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>Text inputs</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal" />
                        <div class="control-group">
                            <label class="control-label">Normal text input</label>
                            <div class="controls">
                                <input type="text" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password input</label>
                            <div class="controls">
                                <input type="password" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Input with description</label>
                            <div class="controls">
                                <input type="text" />
                                <span class="help-block">This is a description</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Input with placeholder</label>
                            <div class="controls">
                                <input type="text" placeholder="This is a placeholder..." />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Normal textarea</label>
                            <div class="controls">
                                <textarea></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>Rest of elements...</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal" />
                        <div class="control-group">
                            <label class="control-label">Select input</label>
                            <div class="controls">
                                <select>
                                    <option />First option
                                    <option />Second option
                                    <option />Third option
                                    <option />Fourth option
                                    <option />Fifth option
                                    <option />Sixth option
                                    <option />Seventh option
                                    <option />Eighth option
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Multiple Select input</label>
                            <div class="controls">
                                <select multiple="">
                                    <option />First option
                                    <option selected="" />Second option
                                    <option />Third option
                                    <option />Fourth option
                                    <option />Fifth option
                                    <option />Sixth option
                                    <option />Seventh option
                                    <option />Eighth option
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Color picker (hex)</label>
                            <div class="controls">
                                <input type="text" data-color="#000000" value="#000000" class="colorpicker input-small" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Color picker (rgba)</label>
                            <div class="controls">
                                <input type="text" data-color="rgba(244,202,56,0.5)" value="rgba(244,202,56,0.5)" data-color-format="rgba" class="colorpicker" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Date picker</label>
                            <div class="controls">
                                <input type="text" data-date="12-02-2012" data-date-format="dd-mm-yyyy" value="12-02-2012" class="datepicker" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Radio inputs</label>
                            <div class="controls">
                                <label><input type="radio" name="radios" /> First One</label>
                                <label><input type="radio" name="radios" /> Second One</label>
                                <label><input type="radio" name="radios" /> Third One</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Checkboxes</label>
                            <div class="controls">
                                <label><input type="checkbox" name="radios" /> First One</label>
                                <label><input type="checkbox" name="radios" /> Second One</label>
                                <label><input type="checkbox" name="radios" /> Third One</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">File upload input</label>
                            <div class="controls">
                                <input type="file" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div id="footer" class="span12">
                2012 &copy; UniAdmin.</div>
        </div>
    </div>
    </div>
@endsection

<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/unicorn.js"></script>
<script src="js/unicorn.form_common.js"></script>