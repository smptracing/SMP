<style>
.thebox{
    height: 90px;
    background-color: white;
    margin: 20px 5px;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    border-radius: 6px;
    position: relative;
}
.thebox .box-header{
    float: left;
    text-align: center;
    margin: -15px 15px 0;
    border-radius: 3px;
    padding: 10px;
    box-shadow:  0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
    position: relative;
}
.thebox .box-header i{
    font-size: 30px;
    line-height: 46px;
    width: 56px;
    height: 46px;
    color: white;
}
.thebox .box-content
{
    text-align: right;
    padding-top: 10px;
    padding: 10px 6px;
    position: relative;
    color: #3C4858;

}
.parrafo
{
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 200;
    line-height: 1em;
    font-size: 15px;
}
.titulo
{
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 200;
    line-height: 1em;
    font-size: 17px;
}

.box-red
{
    background-color: #ef5350;
}
.box-orange
{
    background:  linear-gradient(60deg, #ffa726, #fb8c00);
}
.box-green
{
    background: linear-gradient(60deg, #66bb6a, #43a047);
}
.box-blue
{
    background: linear-gradient(60deg, #26c6da, #00acc1);
}
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-orange">    
                        <i class="fa fa-home"></i>                    
                    </div>
                    <div class="box-content">
                        <p class="titulo">PIA</p>
                        <p class="parrafo">S/. 1,234,321.45</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-red">    
                        <i class="fa fa-home"></i>                     
                    </div>
                    <div class="box-content">
                        <p class="titulo">PIM</p>
                        <p class="parrafo">S/. 123,234,321.43</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-green">  
                        <i class="fa fa-home"></i>                       
                    </div>
                    <div class="box-content">
                        <p class="titulo">DEVENGADO</p>
                        <p class="parrafo">S/. 1,234,321</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-blue"> 
                        <i class="fa fa-home"></i>                        
                    </div>
                    <div class="box-content">
                        <p class="titulo">GIRADO</p>
                        <p class="parrafo">S/. 1,234,321</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>