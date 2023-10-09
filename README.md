### Prueba Desarrollador JR - PD

```sql

CREATE OR REPLACE PROCEDURE prc_detalle_factura_david_avila AS
BEGIN
    -- Calcular el valor total de la factura para todas las mercancías
    UPDATE DETALLE_FACTURA df
	SET df.VALOR = (
	    SELECT SUM(d.CANTIDAD * d.PRECIO)
	    FROM DETALLE_FACTURA d
	    WHERE d.ID_MERCANCIA = df.ID_MERCANCIA
	) AND df.VALOR_IVA (
		SELECT SUM(IVA/100)
	    FROM DETALLE_FACTURA d
	    WHERE d.ID_MERCANCIA = df.ID_MERCANCIA);
	
	DBMS_OUTPUT.PUT_LINE('Procedimiento completado');
   
END;

```


-------
```php
CREATE OR REPLACE PROCEDURE prc_factura_david_avila AS 
BEGIN 
FOR factura_rec IN (SELECT DISTINCT ID_FACTURA FROM DETALLE_FACTURA) LOOP
        DECLARE
            v_valor_total NUMBER;

        BEGIN
        	SELECT SUM(VALOR) INTO v_valor_total
			FROM DETALLE_FACTURA
			WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            -- Actualizar el campo VALOR en la tabla FACTURAS
            UPDATE FACTURAS
            SET  VALOR = v_valor_total
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
        END;
       DBMS_OUTPUT.PUT_LINE('Procedimiento VALOR APLICADO');
       DECLARE
            v_valor_total_iva NUMBER;
	    BEGIN
		    SELECT SUM(VALOR_IVA) INTO v_valor_total_iva
			FROM DETALLE_FACTURA
			WHERE ID_FACTURA = factura_rec.ID_FACTURA;
		
			UPDATE FACTURAS
            SET  IVA = v_valor_total_iva
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
		    
		END;
	 	DECLARE
            v_valor_descuento NUMBER;
		BEGIN        
            -- Calcular el valor total del descuento para la factura actual
            SELECT SUM((DESCUENTO / 100) * VALOR) INTO v_valor_descuento
            FROM FACTURAS
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
           
            IF v_valor_descuento <> 0 THEN
            -- Actualizar el campo IVA en la tabla FACTURAS con el descuento calculado
                UPDATE FACTURAS
                SET VALOR_DESCUENTO  = v_valor_descuento
                WHERE ID_FACTURA = factura_rec.ID_FACTURA;
       		 END IF;
        END;
        END LOOP;
    DBMS_OUTPUT.PUT_LINE('Procedimiento finalizado');
END;
```