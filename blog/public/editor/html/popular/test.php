<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<input type="hidden" name="valid_id" />
<input type="hidden" name="valid_text_name" />
<div>
	* ��� �������� ����Ŭ���ϼž� �����۵��մϴ�. (��) - (�����)	
</div>
<br/><Br/><Br/><Br/><Br/>
<div id="content_area" style="border:1px solid #000;display:flex;flex-wrap:wrap;justify-content:left;min-height:500px;width:100%;z-index:0;">
<!-- <table id="content_area2" style="border:1px solid #000;display:flex;flex-wrap:wrap;justify-content:left;min-height:500px;width:100%;z-index:0;">
	<tr>
		<td>
			<div id="outer_1" name="outer" style="border:1px solid #000;width:500px;height:500px;" onclick="javascript:id_q2(this,'inner_not_click');">
				<div id="inner_1" name="inner" style="border:1px solid #000;width:200px;height:200px;" onclick="javascript:id_q(this,'inner_click');">
				</div>
				<div id="inner_2" name="inner" style="border:1px solid #000;width:200px;height:200px;" onclick="javascript:id_q(this,'inner_click');">
				</div>
			</div>			
		 </td>
	</tr>
</table> -->
<!-- <table class="content" style="background-color:gray;z-index:1;width:300px;height:300px;" ><tr><td valign="top"></td></tr></table> -->
</div>
<div id="translate" style="display:none;"></div>
<input type="hidden" id="aaa" name="bbb" />
<input type="hidden" id="ccc" name="ddd" />
<input type="hidden" id="bbb" name="bbb" />
<input type="hidden" id="eee" name="eee" />
<form name="contents_form" method="post" action="./fileout.php">
  <textarea name="css_vw_area" style="display:none;"></textarea>
  <textarea name="css_px_area" style="display:none;"></textarea>
  <textarea name="contents" style="display:none;"></textarea>
  <input type="button" name="save" value="����" />
</form>
<script>
	var count = 0;
	function id_q(dom, inner_check) {
		if($(dom).attr("name") == "inner") {
			$("#aaa").val(dom.id);
			count = count + 1;
			return;
		}
	}

	function id_q2(dom, inner_check) {
		if(count >= 1) {
			$("#ccc").val("");
			count = 0;
		} else {
			$("#ccc").val(dom.id);					
		}
	}

	var count2 = 0;
	function id_q3(dom, inner_check, uniq) {
		if($(dom).attr("id") == "inner") {
			$("#bbb").val(dom.id);
			count2 = count2 + 1;
			return;
		}
	}

	function id_q4(dom, inner_check, uniq) {
		if(count2 >= 1) {
			$("#eee").val("");
			//$("#bbb").focus();
			count2 = 0;

			$(dom).draggable();
			$(dom).draggable( "destroy" );

		} else {
			$("#eee").val(dom.id);	

			$("input[name=valid_text_name]").val($(dom).attr("name"));
			
			/*
			$("input[id="+$("input[name=valid_text_name]").val()+"]")
			  .on("dragover", dragOver)
			  .on("dragleave", dragOver)
			  .on("drop");
			*/
			/*
			$("#"+$("input[name=valid_text_name]").val()).resizable({
			  disabled: false
			});
			*/

			$("div[name="+$("input[name=valid_text_name]").val()+"]").resizable();

			$("div[name=text_outer_"+ uniq +"]").css("cursor","grab");
			$("div[name=text_inner_"+ uniq +"]").css("cursor","text");

			$("div[name=text_inner_"+ uniq +"]").css("width",(parseInt($("div[name=text_outer_"+ uniq +"]").css("width")) - 20) + "px");
			$("div[name=text_inner_"+ uniq +"]").css("height",(parseInt($("div[name=text_outer_"+ uniq +"]").css("height")) - 40) + "px");

			//alert((parseInt($("div[name=text_outer_"+ uniq +"]").css("width")) - 10) + "px");
			//alert($("div[name=text_outer_"+ uniq +"]").css("width"));

			//$("#"+$("input[name=valid_text_name]").val()).draggable({
			$(dom).draggable({
				 cursor:"pointer", // Ŀ�� ���
				 containment:"#content_area", // div���� ������ �����̵��� ����
				 //axis:"x", // �巡�� ���� ���� (x, y) ��� �����̷��� axis ����
				 revert:false, // true:�巡�� �� ����ġ�� ����, false:�巡�� �� ����(�̵���) ��ġ
			});
			
		}
	}

	var src = $("#content_area").html();

	var regEx = /(\d*(\.?\d*)+\s*px)/gi;


	var Cda = {
		_convertCssVw : function(obj) {

			var src = obj.html();

			var r = src.replace(regEx,  function($1) {
					var a = $1.replace("px",""),
						st = 1440;

						a = parseInt(a);
						//a = (a / ( st / 100)).toFixed(4);
						a = (a / ( st / 100)).toFixed( 4 );
						a = a + "vw";

						return a;
			});
			
			/*
			var str_r = "",
				re = null;

			if($("#attr_chk").is(":checked")) {
				for(var i = 0; i < removeTag.length; i++) {
					str_r = removeTag[i] + regStr;
					re = new RegExp(str_r, "gi");
				
					r = r.replace(re, "" );
				}
			}
			*/
			return r;
			//txtareaRst.addClass("on").val ( r ).select();

		}
	}
	
	$(function () {
		
		$("input[name=save]").click(function () {
			
			var data = Cda._convertCssVw( $("#content_area") );

			$("#translate").html(data);
			//console.log($("#translate").html());
			var contentsCss = "";		

			$($("#translate").find("div")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("table")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
					console.log(contentsCss);
				}
			});

			$($("#translate").find("tr")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("td")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("section")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss +  "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("p")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("h1")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("h2")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("h3")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("h4")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("h5")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("ul")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("li")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("ol")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#translate").find("dd")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			//console.log(contentsCss);
			$("textarea[name=css_vw_area]").val(contentsCss);
			//return;

	
			var contentsCss = "";		

			$($("#content_area").find("div")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("table")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
					console.log(contentsCss);
				}
			});

			$($("#content_area").find("tr")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("td")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("section")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss +  "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("p")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("h1")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("h2")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("h3")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("h4")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + " #" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("h5")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("ul")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("li")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("ol")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});

			$($("#content_area").find("dd")).each(function (idex, item) {
				if(typeof $(item).attr("id") !== "undefined") {
					contentsCss = contentsCss + "#" + $(item).attr("id") + "{" + $(item).attr("style") + "}";
				}
			});
			
			//console.log(contentsCss);
			$("textarea[name=css_px_area]").val(contentsCss);
			//return;
			
			$("textarea[name=contents]").val($("#content_area").html());
			var form = document.contents_form;
			form.submit();
			
		});
		
		var uniqueId = (function(){ var id=0; return function(){ return id++;} })();
		
		$("input[name=imageAdd]").click(function () {
			
			var uniqueId3 = uniqueId();

			$("#content_area").append('<table id="content_'+ uniqueId3 +'" onmouseover="javascript:control_image(this);"  onclick="javascript:control_image(this);" style="background-color:gray;z-index:1;width:300px;height:300px;" ><tr><td valign="top"><a style="color:blue;font-weight:bold;" onclick=\'javascript:remove("content_'+ uniqueId3 +  '");\'>X</a></td></tr></table>');
			
		});

		$("input[name=textAdd]").click(function () {
			
			var uniq = uniqueId();
			
			$("#content_area").append('<div id="outer" name="text_outer_'+ uniq +'" style="position:absolute;border:1px dotted #000;z-index:1;width:150px;height:40px;" onclick="javascript:id_q4(this,\'inner_not_click\', \'' + uniq + '\');"><a onclick=\'javascript:removeName("text_outer_'+ uniq +  '");\' style="color:blue;font-weight:bold;">X</a><div type="text" onclick="javascript:id_q3(this,\'inner_click\', \'' + uniq + '\');" contenteditable="true" id="inner" name="text_inner_'+ uniq +'" style="width:100px;height:30px;"  ></div></div>');
			
		});


	});

	function remove(domId) {
		$("#" + $.trim(domId)).remove();
	}

	function removeName(domName) {
		$("div[name=" + domName + "]").remove();
	}

	function getSample() {

		$.ajax({
			url: "./get_sample.php",
			type: "post",
			data: "data=1",
			success:function(data){
				$("#content_area").html(data);
			}
		});

	}	

</script>


<input type="button" name="imageAdd" value="�̹��� �߰�" />
<input type="button" name="textAdd" value="�ؽ�Ʈ �ڽ� �߰�" />
<a href="/sample/tem/1/sample1.html" target="_blank">����1 ����</a><a href="javascript:getSample();">[����]</a>
  <div style="background-color:#CCFFFF; width:390px; padding: 10px;">

    <button id="selectAll">��ü����</button>
    <button id="bold">����</button>
    <button id="italic">�����</button>
    <button id="underLine">����</button>

    <br/>

    <button id="justifyLeft">��������</button>
    <button id="justifyCenter">�������</button>
    <button id="justifyRight">����������</button>

    <br/>

    <select id="fontName" width="50px">
        <option value="">�۲� ����</option>
        <option value="����">����</option>
        <option value="����">����</option>
        <option value="�ü�">�ü�</option>
        <option value="����">����</option>
        <option value="���� ���">���� ���</option>
    </select>

    <select id="fontSize" width="50px">
        <option value="">���� ũ��</option>
        <option value="1">4px</option>
        <option value="2">8px</option>
        <option value="3">10px</option>
        <option value="4">12px</option>
        <option value="5">16px</option>
        <option value="6">20px</option>
        <option value="7">30px</option>
    </select>

    <select id="foreColor" width="50px">
        <option value="">���� ����</option>
        <option value="#f00">����</option>
        <option value="#00f">�Ķ�</option>
        <option value="#0f0">�ʷ�</option>
        <option value="#ffff00">���</option>
        <option value="#000">����</option>
        <option value="#fff">���</option>
    </select>

    <select id="hiliteColor" width="50px">
        <option value="">���� ����</option>
        <option value="#f00">����</option>
        <option value="#00f">�Ķ�</option>
        <option value="#0f0">�ʷ�</option>
        <option value="#ffff00">���</option>
        <option value="#000">����</option>
        <option value="#fff">���</option>
    </select>

  </div>

<!-- <div class="content">
</div> -->
<input type="button" name="image_control1" value="�̹��� ������ ������" onclick="javascript:zindexin();" />
<input type="button" name="image_control1" value="�̹��� �ڷ� ������" onclick="javascript:zindexout();" />
<input type="button" name="image_control1" value="�̹��� �巡��" onclick="javascript:draglayer();" />
<input type="button" name="image_control1" value="�̹��� ũ�� ����" onclick="javascript:resizableTrue();" />
<input type="button" name="image_control1" value="�̹��� ũ�� ���� ���" onclick="javascript:resizableFalse();" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<br/>* ����û â �׸� ����
<form id="request_form" name="request_form" method="post" onsubmit="javascript:return addRequestForm();" action="./insert_request.php" >
	<div id="request_window_area" style="border:1px solid #000;width:500px;height:300px;"></div>
	<input type="hidden" id="request_key" name="request_key" value="request_key_<?=uniqid()?>" />
	<input type="submit" id="request_save" name="request_save" value="����ûâ �׸� ����" />
</form>
<input type="button" id="addInputText" name="addInputText" value="�Է¹ڽ��߰�" /><br/>
<input type="button" id="addSelectBox" name="addSelectBox" value="����Ʈ�ڽ��߰�" />
<input type="button" id="addSelectBoxDivide" name="addSelectBoxDivide" value="����Ʈ�ڽ��׸��߰�" />
<input type="text" id="selectDivide1" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�1" />
<input type="text" id="selectDivide2" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�2" />
<input type="text" id="selectDivide3" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�3" />
<input type="text" id="selectDivide4" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�4" />
<input type="text" id="selectDivide5" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�5" />
<span id="selectDivideAddArea"></span><br/>
<input type="button" id="addCheckBox" name="addCheckBox" value="üũ�ڽ��߰�" />
<input type="text" id="checkDivide1" name="checkDivideContent" placeholder="üũ�ڽ�����" />
<input type="button" id="addRadioBox" name="addRadioBox" value="�����ڽ��߰�" />
<input type="text" id="radioDivide1" name="radioDivideContent" placeholder="��������" /><br/>
<input type="button" id="addGroupCheckBox" name="addGroupCheckBox" value="�׷���üũ�ڽ��߰�" />
<select id="group_check_box_cnt" name="group_check_box_cnt" >
	<option value="">==üũ�ڽ��׷찳������==</option>
	<option value="2">2��</option>
	<option value="3">3��</option>
	<option value="4">4��</option>
	<option value="5">5��</option>
</select><span id="chkGroupContent"></span><br/>
<input type="button" id="addGroupRaioBox" name="addGroupRaioBox" value="�׷��ζ����ڽ��߰�" />
<select id="group_radio_cnt" name="group_radio_cnt" >
	<option value="">==�����׷찳������==</option>
	<option value="2">2��</option>
	<option value="3">3��</option>
	<option value="4">4��</option>
	<option value="5">5��</option>
</select><span id="radioGroupContent"></span><br/>
<script type="text/javascript">

	function addRequestForm() {
		if($("#request_window_area").html() == "") {
			alert("����û �׸��� ���� �� �Է����ּ���.");
			return false;
		}
	}

	$(function () {
		
		var uniqueId2 = (function(){ var id2=0; return function(){ return id2++;} })();
		
		$("#addSelectBoxDivide").click(function () {
			
			var uniqueId7 = uniqueId2();

			$("#selectDivideAddArea").append('&nbsp;<input type="text" id="selectDivide' + ($("input[name='selectDivide[]']").length + 1) + '" name="selectDivide[]" placeholder="����Ʈ�ڽ��׸�' + ($("input[name='selectDivide[]']").length + 1) + '" />');
			
		});

		$("#addGroupRaioBox").click(function () {

			var uniqueId7 = uniqueId2();			

			var group_radio_contents = "<div id='div_group_radio_" + uniqueId7 + "'><a onclick=javascript:remove('div_group_radio_" + uniqueId7 + "');>X</a>";
			$("input[name=radio_group_input]").each(function () {
				
				if($(this).val() != "") {
					group_radio_contents = group_radio_contents + "<input type='radio' id='group_radio_" + uniqueId7 + "' name='group_radio_" + uniqueId7 + "' value='" + $(this).val() + "' />" + $(this).val() + "";
				}

			});

			group_radio_contents = group_radio_contents + "</div>";

			if(group_radio_contents == "<div></div>") {
				alert("�׷���� ������ �Է����ּ���.");
				return;
			}

			$("#request_window_area").append(group_radio_contents);

		});

		$("#addGroupCheckBox").click(function () {

			var uniqueId7 = uniqueId2();			

			var group_chk_contents = "<div id='div_group_checkbox_" + uniqueId7 + "'><a onclick=javascript:remove('div_group_checkbox_" + uniqueId7 + "');>X</a>";
			$("input[name=chk_group_input]").each(function () {
				
				if($(this).val() != "") {
					group_chk_contents = group_chk_contents + "<input type='checkbox' id='group_checkbox_" + uniqueId7 + "' name='group_checkbox_" + uniqueId7 + "' value='" + $(this).val() + "' />" + $(this).val() + "";
				}

			});

			group_chk_contents = group_chk_contents + "</div>";

			if(group_chk_contents == "<div></div>") {
				alert("�׷�üũ�ڽ� ������ �Է����ּ���.");
				return;
			}

			$("#request_window_area").append(group_chk_contents);

		});

		$("#group_radio_cnt").change(function () {

			var uniqueId7 = uniqueId2();
			
			var radio_input_area = "";
			//$($(this).val()).each(function (index, item) {
			for(var i=1;i<=$(this).val();i++) {	
			
				radio_input_area = radio_input_area + "&nbsp;<input type='text' id='radio_group_input" + i + "' name='radio_group_input' placeholder='�׷�����Է�" + i + "' />";
				
				//console.log(i);
			}
			//});

			$("#radioGroupContent").html(radio_input_area);

		});

		$("#group_check_box_cnt").change(function () {

			var uniqueId7 = uniqueId2();
			
			var chk_input_area = "";
			//$($(this).val()).each(function (index, item) {
			for(var i=1;i<=$(this).val();i++) {	
				
				chk_input_area = chk_input_area + "&nbsp;<input type='text' id='chk_group_input" + i + "' name='chk_group_input' placeholder='�׷�üũ�ڽ��Է�" + i + "' />";
				
				//console.log(i);
			}
			//});

			$("#chkGroupContent").html(chk_input_area);

		});

		$("#addRadioBox").click(function () {
			
			if($("#radioDivide1").val() == "") {
				alert("���������� �Է����ּ���.");
				return;
			}

			var uniqueId7 = uniqueId2();
			
			$("#request_window_area").append("<div id='radio_area_" + uniqueId7 + "'><a onclick=javascript:remove('radio_area_" + uniqueId7 + "');>X</a><input type='checkbox' id='radio_content_" + uniqueId7 + "' name='radio_content' value='" + $("#radioDivide1").val() + "' />" + $("#radioDivide1").val() + "</div>");
			
		});

		$("#addCheckBox").click(function () {
			
			if($("#checkDivide1").val() == "") {
				alert("üũ�ڽ������� �Է����ּ���.");
				return;
			}

			var uniqueId7 = uniqueId2();
			
			$("#request_window_area").append("<div id='checkbox_area_" + uniqueId7 + "'><a onclick=javascript:remove('checkbox_area_" + uniqueId7 + "');>X</a><input type='checkbox' id='chk_content_" + uniqueId7 + "' name='chk_content' value='" + $("#checkDivide1").val() + "' />" + $("#checkDivide1").val() + "</div>");
			
		});
		
		$("#addSelectBox").click(function () {

			var uniqueId5 = uniqueId2();				
			
			var option_string = "";
			$("input[name='selectDivide[]']").each(function (index, item) {

				if($(item).val() != "") {
					
					option_string = option_string + "<option value='" + $(item).val() + "'>" + $(item).val() + "</option>";
					
				}
				
			});
			
			if(option_string == "") {
				alert("����Ʈ �׸��� �Է����ּ���.");
				return;
			}

			$("#request_window_area").append("<div id='select_area_" + uniqueId5 + "' ><a onclick=javascript:remove('select_area_" + uniqueId5 + "')>X</a><input type='text' id='select_text_area_" + uniqueId5 + "' name='select_text_area' style='width:80px;' value='Text'>&nbsp;<select id='select_area_" + uniqueId5 + "'>" + option_string + "</select></div>");
			
		});

		$("#addInputText").click(function () {
			
			var uniqueId6 = uniqueId2();

			$("#request_window_area").append("<div id='input_area_" + uniqueId6 + "'><a onclick=javascript:remove('input_area_" + uniqueId6 + "')>X</a><input type='text' id='input_text_area_" + uniqueId6 + "' name='input_text_area' style='width:80px;' value='Text'>&nbsp;<input type='text' id='input_area_" + uniqueId6 + "' name='input_contents_area' /><br/></div>")
			
		});
		
	});
	

</script>
<style>
.content {
	/*
	outline: 2px dashed #92b0b3 ;
    outline-offset:-10px;  
    text-align: center;
    transition: all .15s ease-in-out;
	width: 300px;
    height: 300px;
	z-index:0;
    background-color: gray;
	*/
}

</style>

<script type="text/javascript">

function control_image(dom) {
	//alert("���� �̹����� ���õǾ����ϴ�.");
	$("input[name=valid_id]").val(dom.id);
	
	//alert($("input[name=valid_id]").val());
	//alert("table[id="+$("input[name=valid_id]").val()+"]");
	$("#"+$("input[name=valid_id]").val())
	  .on("dragover", dragOver)
	  .on("dragleave", dragOver)
	  .on("drop", uploadFiles);

	//$("#"+$("input[name=valid_id]").val()).css("z-index","999");
	//$(".content").draggable();
	
	//alert("#"+$("input[name=valid_id]").val());
	var nodid = $("input[name=valid_id]").val();

	$("#"+nodid).draggable({
		 cursor:"pointer", // Ŀ�� ���
		 containment:"#content_area", // div���� ������ �����̵��� ����
		 //axis:"x", // �巡�� ���� ���� (x, y) ��� �����̷��� axis ����
		 revert:false, // true:�巡�� �� ����ġ�� ����, false:�巡�� �� ����(�̵���) ��ġ
	});
	
}

function control_text(dom) {

	$("input[name=valid_text_name]").val(dom.id);
	
	/*
	$("input[id="+$("input[name=valid_text_name]").val()+"]")
	  .on("dragover", dragOver)
	  .on("dragleave", dragOver)
	  .on("drop");
	*/

	//$("#"+$("input[name=valid_text_name]").val()).draggable({
	$("#"+dom.id).draggable({
		 cursor:"pointer", // Ŀ�� ���
		 containment:"#content_area", // div���� ������ �����̵��� ����
		 //axis:"x", // �巡�� ���� ���� (x, y) ��� �����̷��� axis ����
		 revert:false, // true:�巡�� �� ����ġ�� ����, false:�巡�� �� ����(�̵���) ��ġ
	});


}

function dragOver(e){
  e.stopPropagation();
  e.preventDefault();
}

function uploadFiles(e){
  e.stopPropagation();
  e.preventDefault();
}

function dragOver(e) {
    e.stopPropagation();
    e.preventDefault();
    if (e.type == "dragover") {
        $(e.target).css({
            "background-color": "black",
            "outline-offset": "-20px"
        });
    } else {
        $(e.target).css({
            "background-color": "gray",
            "outline-offset": "-10px"
        });
    }
}

function uploadFiles(e) {
    e.stopPropagation();
    e.preventDefault();
    dragOver(e); //1
 
    e.dataTransfer = e.originalEvent.dataTransfer; //2
    var files = e.target.files || e.dataTransfer.files;

    if(files.length > 1) {
        alert('�Ѱ��� �̹����� �÷��ּ���.');
        return;
    }

	if(files[0].type.match(/image.*/)) {

		var form_data = new FormData();                  
		form_data.append('upfiles', files[0]);
		$.ajax({
			type: 'POST',
			url: 'file_upload2.php',
			contentType: false,
			processData: false,
			data: form_data,
			success:function(response) {
				$(e.target).css({
					"background-image": "url('" + response + "')",
					"outline": "none",
					"background-size": "100% 100%"
				});
			}
		});
	
	/*				
		$(e.target).css({
			"background-image": "url(" + window.URL.createObjectURL(files[0]) + ")",
			"outline": "none",
			"background-size": "100% 100%"
		});
	*/

	}else{
	  alert('�̹����� �ƴմϴ�.');
	  return;
	}

}

function zindexin() {
	$("#"+$("input[name=valid_id]").val()).css("z-index","1");
}

function zindexout() {
	$("#"+$("input[name=valid_id]").val()).css("z-index","-1");
}

function draglayer() {
	//$("#"+$("input[name=valid_id]").val()).css("z-index","999");
	//$(".content").draggable();
	
	$("#"+$("input[name=valid_id]").val()).draggable({
		 cursor:"pointer", // Ŀ�� ���
		 containment:"#content_area", // div���� ������ �����̵��� ����
		 //axis:"x", // �巡�� ���� ���� (x, y) ��� �����̷��� axis ����
		 revert:false, // true:�巡�� �� ����ġ�� ����, false:�巡�� �� ����(�̵���) ��ġ
	});

}

function resizableTrue() {

	//$('.content').resizable();
	$("#"+$("input[name=valid_id]").val()).resizable({
	  disabled: false
	});

}

function resizableFalse() {

	//$('.content').resizable(false);
	//$( ".content" ).resizable( "option", "aspectRatio", false );
	//$( ".content" ).resizable( "option", "cancel", true );
	$("#"+$("input[name=valid_id]").val()).resizable( "option", "disabled", true );
}

</script>
<script>

  document.execCommand('styleWithCSS', false, true);

  document.execCommand('insertBrOnReturn', false, true);

  $(document).ready(function() {

	$("#content_area").resizable();
	/*
	$( ".content" ).resizable({
	  disabled: false
	});
	*/

    $("#text").focus();

    $('button').click(function(){

      document.execCommand($(this).attr('id'), false, true);

    });

    $('#bold').click(function() {

        document.execCommand('bold', false, true);
    });

    $('#selectAll').click(function() {

        document.execCommand('selectAll', false, true);
    });

    $('#italic').click(function() {

       document.execCommand('italic', false, true);

    });

    $("#underLine").click(function() {

       document.execCommand('underLine', false, true);

    });

    $("#justifyLeft").click(function() {

       document.execCommand('justifyLeft', false);

    });

    $("#justifyRight").click(function() {

       document.execCommand('justifyRight', false);

    });

    $("#justifyCenter").click(function() {

       document.execCommand('justifyCenter', false);

    }); 

    $('select').change(function(){

      document.execCommand($(this).attr('id'), false, $(this).val());

    });

    $("#foreColor").change(function(){ 

       document.execCommand('foreColor', false, $(this).val());

    });

    $("#hiliteColor").change(function(){

       document.execCommand('hiliteColor', false, $(this).val());

    });

    $("#fontName").change(function(){

       document.execCommand('fontName', false, $(this).val());

    });

    $("#fontSize").change(function(){

       document.execCommand('fontSize', false, $(this).val());

    });


    //$('button').click(function(){

		//$("input[name="+$("#valid_text_name").val()+"]").css();

    //});

  });

</script>
