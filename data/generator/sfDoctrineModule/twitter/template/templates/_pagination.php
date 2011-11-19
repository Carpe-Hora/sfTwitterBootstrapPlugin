

<div class="pagination fRight mts">
  <ul>
    <li class="first [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a title="[?php echo __('First page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">&lArr;</a>
    </li>
    <li class="prev [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a title="[?php echo __('Previous page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">&larr;</a>
    </li>

    [?php foreach ($pager->getLinks() as $page): ?]
      [?php if ($page == $pager->getPage()): ?]
        <li class="active"><a href="#">[?php echo $page ?]</a></li>
      [?php else: ?]
        <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
      [?php endif; ?]
    [?php endforeach; ?]

    <li class="next [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a title="[?php echo __('Next page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">&rarr;</a>
    </li>
    <li class="last [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]">
      <a title="[?php echo __('Last page', array(), 'sf_admin') ?]" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">&rArr;</a>
    </li>
  </ul>
</div>
