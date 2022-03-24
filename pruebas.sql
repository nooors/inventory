desc prendas;


SELECT p.id_categoria as Categoria, p.id_familia as Familia,
                     p.id_modelo as Modelo, p.id_talla as Talla, 
                     p.id_color as Color, p.cantidad as Cantidad,
                     FROM prendas p;

SELECT  mo.modelo as Modelo,
        fam.familia as Familia
         FROM prendas pren
            INNER JOIN categorias cat
                ON cat.id = pren.id_categoria
            INNER JOIN familias fam
                ON fam.id = pren.id_familia
            INNER JOIN modelos mo
                ON mo.id = pren.id_modelo;
