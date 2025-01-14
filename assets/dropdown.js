function spinner(){
    const animation=document.getElementById('menuToggle');
    animation.classList.add('animate-spin');
    setTimeout(function(){
        animation.classList.remove('animate-spin');
    },520);
}
document.getElementById('menuToggle').addEventListener('click', function() {
    const menuItems = document.getElementById('menuItems');
    menuItems.classList.toggle('hidden');
    menuItems.classList.toggle('flex');
});