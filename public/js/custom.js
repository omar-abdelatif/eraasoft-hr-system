let table = new DataTable('#table', {
    paging: true,
    scrollY: 400,
    ordering: true,
    select: true,
    autoWidth: true,
    searching: true,
    pageLength: 20,
    pagingTag: 'button',
    pagingType: 'simple_numbers',
});
const currentYear = new Date().getFullYear();
document.getElementById("year").innerHTML = currentYear;
