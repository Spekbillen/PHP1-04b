function changeLink(props){
    if ((props.selectedIndex - 1) == 0){
        window.location.href = 'http://127.0.0.1:8000/';
    } else {
        window.location.href = 'http://127.0.0.1:8000/r/' + (props.selectedIndex - 1);
    }
}

function postClick(id){
    window.location.href = 'http://127.0.0.1:8000/p/' + id;
}
