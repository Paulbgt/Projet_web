
function clearArticle() {
    document.querySelector('.listArticle').innerHTML = "";
}


function generateArticle(id, name, price, category, description, url) {
    var listArticle = document.querySelector('.listArticle');
    var art_form, article, art_img, art_name, art_infos, art_price, art_category, art_description, hidden, submit;
    
    art_form = document.createElement('form');
    art_form.setAttribute('action', "php/add_article_caddy.php");
    art_form.setAttribute('method', "POST");
    
    article = document.createElement('div');
    article.className = "article";
    
    art_img = document.createElement('div');
    art_img.className = "AKL-ctn--c1 article-img";
    art_img.style.backgroundImage = "url(../" + id + "/" + url + ")";
    
    art_name = document.createElement('h3');
    art_name.className = "article-img-title";
    art_name.setAttribute('name', "shop-info-name");
    art_name.innerHTML = name;
    
    art_infos = document.createElement('div');
    art_infos.className = "AKL-ctn--c1 article-infos";
    
    art_price = document.createElement('span');
    art_price.className = "article-infos-price";
    art_price.setAttribute('name', "shop-info-price");
    art_price.innerHTML = price;
    
    art_category = document.createElement('span');
    art_category.className = "article-infos-category";
    art_category.innerHTML = category;
    
    art_description = document.createElement('p');
    art_description.className = "article-infos-description";
    art_description.setAttribute('name', "shop-info-description");
    art_description.innerHTML = description;
    
    hidden = document.createElement('input');
    hidden.setAttribute('name', "take_id_produce");
    hidden.setAttribute('type', "hidden");
    hidden.setAttribute('readonly', "true");
    hidden.setAttribute('value', id);
    
    submit = document.createElement('input');
    submit.className = "AKL-btnModern-Shine-ocean article-infos-btnAdd";
    submit.setAttribute('type', "submit");
    submit.setAttribute('value', "+");
    
    art_img.appendChild(art_name);
    art_infos.appendChild(art_price);
    art_infos.appendChild(art_category);
    art_infos.appendChild(art_description);
    art_infos.appendChild(hidden);
    art_infos.appendChild(submit);
    
    article.appendChild(art_img);
    article.appendChild(art_infos);
    art_form.appendChild(article);
    
    listArticle.appendChild(art_form);
}