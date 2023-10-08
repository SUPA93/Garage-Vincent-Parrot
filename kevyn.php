<select id="tri" name="tri">
    <option value="recentes" <?= $tri === "recentes" ? "selected" : "" ?>>Plus récentes (Date de Publication)</option>
    <option value="anciennes" <?= $tri === "anciennes" ? "selected" : "" ?>>Plus anciennes (Date de Publication)</option>
    <option value="prix-croissant" <?= $tri === "prix-croissant" ? "selected" : "" ?>>Prix croissant</option>
    <option value="prix-decroissant" <?= $tri === "prix-decroissant" ? "selected" : "" ?>>Prix décroissant</option>
    <option value="kilometrage-croissant" <?= $tri === "kilometrage-croissant" ? "selected" : "" ?>>Kilométrage croissant</option>
    <option value="kilometrage-decroissant" <?= $tri === "kilometrage-decroissant" ? "selected" : "" ?>>Kilométrage décroissant</option>
    <option value="année-mise-en-circulation-asc" <?= $tri === "année-mise-en-circulation-asc" ? "selected" : "" ?>>Année de mise en circulation (Croissant)</option>
    <option value="année-mise-en-circulation-desc" <?= $tri === "année-mise-en-circulation-desc" ? "selected" : "" ?>>Année de mise en circulation (Décroissant)</option>
</select>