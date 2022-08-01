<div>
    <label for="inputAliasDescriptivo">Alias descriptivo</label>
    <input type="text" id="inputAliasDescriptivo" placeholder="Ej. Tarjeta morada con simbolo">
</div>
<div>
    <label for="selectBanco">Banco</label>
    <select name="banco" id="selectBanco">
        @foreach($bancario['nombres_bancos'] as $banco)
        <option value="{{ $banco }}">{{ $banco }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="inputNumero">Número</label>
    <input type="text" name="numero" id="inputTarjeta" placeholder="XXXX XXXX XXXX XXXX">
</div>
<div>
    <label for="selectRedTarjeta">Red de tarjeta</label>
    <select name="red_tarjeta" id="selectRedTarjeta">
        @foreach($bancario['redes_tarjeta'] as $red)
        <option value="{{ $red }}">{{ $red }}</option>
        @endforeach
    </select>
</div>
<label>Fecha de vencimiento</label>
<div>
    <label for="selectMesVencimiento">Mes</label>
    <select name="mes_vencimiento" id="selectMesVencimiento">
        @foreach($tiempo['meses'] as $numero_mes => $nombre_mes)
        <option value="{{ $numero_mes }}">{{ $numero_mes < 10 ? "0{$numero_mes}" : $numero_mes }} ({{ ucfirst($nombre_mes) }})</option>
        @endforeach
    </select>
</div>
<div>
    <label for="selectYearVencimiento">Año</label>
    <select name="year_vencimiento" id="selectYearVencimiento">
        @foreach($bancario['vigencias_tarjeta'] as $year)
        <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
</div>
