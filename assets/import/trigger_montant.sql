-- Fonction pour calculer et mettre à jour le montant d'une facture
CREATE OR REPLACE FUNCTION update_facture_montant()
RETURNS TRIGGER AS $$
DECLARE
    v_facture_id INTEGER;
BEGIN
    -- Identifier la facture concernée
    IF TG_OP = 'DELETE' THEN
        v_facture_id := OLD.facture_id;
    ELSE
        v_facture_id := NEW.facture_id;
    END IF;

    -- Recalculer le montant de la facture
    UPDATE facture
    SET montant = (
        SELECT COALESCE(SUM(t.cout * ftr.quantite), 0)
        FROM facture_type_reparation ftr
        JOIN type_reparation t ON ftr.reparation_id = t.id
        WHERE ftr.facture_id = v_facture_id
    )
    WHERE id = v_facture_id;

    RETURN NULL;
END;
$$ LANGUAGE plpgsql;


-- Créer un trigger sur facture_type_reparation pour que le montant soit recalculé après chaque insertion ou mise à jour
CREATE TRIGGER facture_montant_trigger
AFTER INSERT OR UPDATE OR DELETE ON facture_type_reparation
FOR EACH ROW
EXECUTE FUNCTION update_facture_montant();