select id, date, libelle, debit from bitcoin where compte="cb boursorama" and budget="aout2026" order by date
select round(sum(debit),2) from bitcoin where compte="cb boursorama" and budget="aout2026"
