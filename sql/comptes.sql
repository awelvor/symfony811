select compte, round(sum(credit - debit),2) as solde 
from bitcoin 
where compte in ('ccsg','cc boursorama','cb boursorama','cvi philippe','cvi nicole') and banque is not null 
group by compte;
