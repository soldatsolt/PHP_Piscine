var ft_list;
var cookie = [];

//onunload
window.onunload = function () {
	var todo = ft_list.children();
    var newCookie = [];
    for (var i = 0; i < todo.length; i++)
        newCookie.unshift(todo[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
};

//onload
function getTodos()
{
	ft_list = $('#ft_list');
	$('#ft_list div').click(rmToDo);
	var tmp = document.cookie;
	if (tmp) {
        cookie = JSON.parse(tmp);
        cookie.forEach(function (name) {
            AddElem(name);
        });
    }	
}

function NewElem()
{
	var ElemName = prompt('name of todo', '');
	AddElem(ElemName)
}

function AddElem(ElemName)
{
	ft_list.prepend($('<div>' + ElemName + '</div>').click(rmToDo));
}

function rmToDo()
{
	if (confirm("Do you want to remove TODO ?"))
		this.remove();
}