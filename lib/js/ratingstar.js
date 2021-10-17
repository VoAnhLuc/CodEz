function changeStarColor(idStar, star)
{
    for(let i = 1; i <= star; i++)
    {
        document.getElementById(idStar + '-' + i).innerHTML = ' <i class="bi bi-star-fill"></i>';
    }
    for(let i = star+1; i <= 5; i++)
    {
        document.getElementById(idStar + '-' + i).innerHTML = ' <i class="bi bi-star"></i>';
    }
}

function resetStarColor(idStar, defaultRank)
{
    for(let i = 1; i <= 5; i++)
    {
        document.getElementById(idStar + '-' + i).innerHTML = ' <i class="bi bi-star' + (i <= defaultRank ? '-fill' : '') + '"></i>';
    }
}