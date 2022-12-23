console.clear();

function ajaxLoad() {
    var value = $("#selectCate").children("option:selected").val();
    $.ajax({
        url: "/instructor/get_sub_cate",
        type: "POST",
        data: {
            cate_id: value,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            $data = res;
            let options = 0,
                option;
            $data.forEach((element) => {
                option = `<option value='${element.id}'>${element.sub_cate_name}</option>`;
                options += option;
            });
            $("#selectSubCate").html(options);
            console.log($data);
        },
    });
}

$(document).ready(function () {
    ajaxLoad();
    $("#selectCate").bind("change", ajaxLoad);
});
