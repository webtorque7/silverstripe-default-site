<div id="$Name" class="field<% if $extraClass %> $extraClass<% end_if %>">
	<% if $Title %><label for="$ID">$Title</label><% end_if %>
	
	$Field
	
	<% if $RightTitle %><label class="right" for="$ID">$RightTitle</label><% end_if %>
	<% if $Message %><label class="message $MessageType error" for="$ID">$Message</label><% end_if %>
	<% if $Description %><span class="description">$Description</span><% end_if %>
</div>
