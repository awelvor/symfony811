/*   update */


select * from bitcoin               where credit=1393.92 and banque is null and libelle='cram';
update bitcoin set credit = 1378.88 where credit=1393.92 and banque is null and libelle='cram';
select * from bitcoin               where credit=1378.88 and banque is null and libelle='cram';

select * from bitcoin               where credit=1471.90 and banque is null and libelle='agirc';
update bitcoin set credit = 1468.69 where credit=1471.90 and banque is null and libelle='agirc';
select * from bitcoin               where credit=1468.69 and banque is null and libelle='agirc';

select * from bitcoin               where credit= 518.64 and banque is null and libelle='cram';
update bitcoin set credit = 540.46  where credit= 518.64 and banque is null and libelle='cram';
select * from bitcoin               where credit= 540.46 and banque is null and libelle='cram';

select * from bitcoin               where credit= 491.45 and banque is null and libelle='arrco';
update bitcoin set credit = 490.38  where credit= 491.45 and banque is null and libelle='arrco';
select * from bitcoin               where credit= 490.38 and banque is null and libelle='arrco';

select * from bitcoin               where debit= 14.50 and banque is null and libelle='alliage gestion';
update bitcoin set debit=16.0       where debit= 14.50 and banque is null and libelle='alliage gestion';
select * from bitcoin               where debit= 16.00 and banque is null and libelle='alliage gestion';

select * from bitcoin                       where libelle like 'bureau%';
update bitcoin set libelle='bureau vallee'  where libelle like 'bureau%';
select * from bitcoin                       where libelle like 'bureau%';

update actifs set c17 = 0 ;

select *                   from bitcoin where date > '2026-03-07' and date < '2026-03-18' and compte = 'cb boursorama';
select round(sum(debit),2) from bitcoin where date > '2026-03-07' and date < '2026-03-18' and compte = 'cb boursorama';

select date, libelle, credit, debit from bitcoin  where budget="mars2026" order by date;
select budget, round(sum(credit),2), round(sum(debit),2), round(sum(credit-debit),2) from bitcoin where budget like '%2026' group by budget;



update bitcoin set banque2=date;
update bitcoin set banque2=null where banque is null;
select * from bitcoin order by cheque desc;


/* end of file */
