### Prueba Desarrollador JR - PD

```sql

CREATE OR REPLACE PROCEDURE prc_detalle_factura_david_avila AS
BEGIN
    -- Calcular el valor total de la factura para todas las mercancías
    UPDATE DETALLE_FACTURA df
    SET df.VALOR = df.CANTIDAD * df.PRECIO,
        df.VALOR_IVA = (df.CANTIDAD * df.PRECIO) * (df.IVA / 100)
    WHERE df.ID_FACTURA IN (SELECT DISTINCT ID_FACTURA FROM DETALLE_FACTURA);

    DBMS_OUTPUT.PUT_LINE('Procedimiento completado');
END;
```


-------
```sql

CREATE OR REPLACE PROCEDURE prc_factura_david_avila AS 
BEGIN 
    FOR factura_rec IN (SELECT DISTINCT ID_FACTURA FROM DETALLE_FACTURA) LOOP
        DECLARE
            v_valor_total NUMBER;
            v_valor_total_iva NUMBER;
            v_valor_descuento NUMBER;
            valor_total NUMBER;
           	calculo_valor_total NUMBER;
        BEGIN
            -- Calcular el valor total de la factura
            SELECT SUM(VALOR) INTO v_valor_total
            FROM DETALLE_FACTURA
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            -- Actualizar el campo VALOR en la tabla FACTURAS
            UPDATE FACTURAS
            SET VALOR = v_valor_total
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            -- Calcular el valor total del IVA
            SELECT SUM(VALOR_IVA) INTO v_valor_total_iva
            FROM DETALLE_FACTURA
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            -- Actualizar el campo IVA en la tabla FACTURAS
            UPDATE FACTURAS
            SET IVA = v_valor_total_iva
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            -- Calcular el valor total del descuento para la factura actual
            SELECT SUM((DESCUENTO / 100) * VALOR) INTO v_valor_descuento
            FROM FACTURAS
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            IF v_valor_descuento IS NOT NULL THEN
                -- Actualizar el campo VALOR_DESCUENTO en la tabla FACTURAS con el descuento calculado
                UPDATE FACTURAS
                SET VALOR_DESCUENTO = v_valor_descuento
                WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            END IF;
            
            -- Calcular el valor total final de la factura
            SELECT ((VALOR - NVL(VALOR_DESCUENTO, 0)) * NVL(IVA, 0) / 100) + (VALOR - NVL(VALOR_DESCUENTO, 0)) INTO valor_total
            FROM FACTURAS
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
            
            -- Actualizar el campo VALOR_TOTAL en la tabla FACTURAS
            UPDATE FACTURAS
            SET VALOR_TOTAL = valor_total
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
           
           -- Calcular valor total
            SELECT ((VALOR - VALOR_DESCUENTO) * IVA) + (VALOR - VALOR_DESCUENTO) INTO calculo_valor_total
            FROM FACTURAS
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;

            -- Actualizar el campo VALOR_TOTAL en la tabla FACTURAS
            UPDATE FACTURAS
            SET VALOR_TOTAL = calculo_valor_total
            WHERE ID_FACTURA = factura_rec.ID_FACTURA;
        END;
    END LOOP;
    DBMS_OUTPUT.PUT_LINE('Procedimiento finalizado');
END;
```