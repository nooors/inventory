SELECT p.id_categoria as Categoria, p.id_familia as Familia,
                     p.id_modelo as Modelo, p.id_talla as Talla, 
                     p.id_color as Color, p.cantidad as Cantidad
                     FROM prendas p;


SELECT p.id_categoria as Categoria, p.id_familia as Familia,
                     p.id_modelo as Modelo, p.id_talla as Talla, 
                     p.id_color as Color, p.cantidad as Cantidad,
                     FROM prendas p;

SELECT cat.categoria as Categoria, fam.familia as Familia,
        mo.modelo as Modelo, ta.talla as Talla,
        col.color as Color, pren.cantidad as Cantidad
        FROM prendas pren
            INNER JOIN categorias cat
                ON cat.id = pren.id_categoria
            INNER JOIN familias fam
                ON fam.id = pren.id_familia
            INNER JOIN modelos mo
                ON mo.id = pren.id_modelo
            INNER JOIN tallas ta
                ON ta.id = pren.id_talla
            INNER JOIN colores col
                ON col.id = pren.id_color;


SELECT cat.categoria as Categoria, fam.familia as Familia,
        mo.modelo as Modelo, ta.talla as Talla,
        col.color as Color, pren.cantidad as Cantidad
        FROM prendas pren
            INNER JOIN categorias cat
                ON cat.id = pren.id_categoria
            INNER JOIN familias fam
                ON fam.id = pren.id_familia
            INNER JOIN modelos mo
                ON mo.id = pren.id_modelo
            INNER JOIN tallas ta
                ON ta.id = pren.id_talla
            INNER JOIN colores col
                ON col.id = pren.id_color
            WHERE pren.id_categoria = 1            
            GROUP BY pren.id_modelo;


SELECT cat.categoria as Categoria, fam.familia as Familia,
        mo.modelo as Modelo, ta.talla as Talla,
        col.color as Color, pren.cantidad as Cantidad
        FROM prendas pren
            INNER JOIN categorias cat
                ON cat.id = pren.id_categoria
            INNER JOIN familias fam
                ON fam.id = pren.id_familia
            INNER JOIN modelos mo
                ON mo.id = pren.id_modelo
            INNER JOIN tallas ta
                ON ta.id = pren.id_talla
            INNER JOIN colores col
                ON col.id = pren.id_color
            WHERE pren.id_color = 5
            GROUP BY pren.id_modelo;
